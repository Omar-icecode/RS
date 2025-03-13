<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Marketer;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\DB;

use function Laravel\Prompts\form;

class MarketerController extends Controller
{
    public function dashboard()
    {
        return view('dashboard.index', [
            'marketers' => Marketer::filter(request(['searchSerialNo', 'filterBy']))->get(),
            'clients' => Client::get(),
            'number' => Marketer::get()

        ]);
    }

    public function show(Marketer $marketer)
    {
        return view('marketer.details', [
            'marketer' => $marketer,
            'clients' => $marketer->client()->get()
        ]);
    }

    public function store(Request $request)
    {
        $formFields = $request->validate([
            'fullname' => 'required',
            'contact' => ['required', Rule::unique('marketers', 'contact')],
            'serial_number' => 'required',
            'address' => 'required',
        ], [
            'contact.unique' => 'This marketer already exist',
        ]);

        Marketer::create(array_merge($formFields, ['amount_paid' => 0.00, 'unpaid_amount' => 0.00]));
        return back()->with('message', 'Marketer added successfully');
    }

    public function client()
    {
        return view('dashboard.client');
    }

    public function livesearch(Request $request)
    {
        if ($request->ajax()) {
            $output = '';
            $query = $request->get('query');

            if ($query != '') {
                $data = DB::table('marketers')->where('serial_number', $query)->get();
            } else {
                $data = "";
            }

            if ($data->count() == 0) {
                $output = "<span class='text-danger'>marketer does not exist</span>";
            } else if ($data->count() === 1) {
                foreach ($data as $name) {
                    $output = "<strong>$name->fullname</strong>";
                }
            }

            $data = array(
                'marketer_name' => $output
            );
            echo json_encode($data);
        }
    }

    public function store_client(Request $request)
    {
        $formFields = $request->validate([
            'fullname' => 'required',
            'contact' => ['required', Rule::unique('clients', 'contact')],
            'address' => 'required',
            'referred_by' => 'required'
        ], [
            'contact.unique' => "This client already exists"
        ]);

        if (Marketer::where('serial_number', $formFields['referred_by'])->count() == 0) {
            return back()->with('msg', 'serial number does not exist');
        }


        Client::create(array_merge($formFields, ['date_attended' => now(), 'service_offered' => 'free screening', 'amount_paid' => str(0.00)]));

        DB::table('marketers')
            ->where('serial_number', $formFields['referred_by'])
            ->update(['unpaid_amount' => DB::raw('unpaid_amount + 5')]);

        return redirect('/')->with('message', 'client added succesfully');
    }

    public function pay_marketer(Request $request, Marketer $marketer)
    {
        $formFields = $request->validate([
            'amount_paid' => 'required'
        ]);

        $marketer->update(array_merge($formFields, [
            'amount_paid' => $formFields['amount_paid'] + $marketer->amount_paid,
            'unpaid_amount' => $marketer->unpaid_amount -  $formFields['amount_paid']
        ]));
        return back()->with('message', $marketer->fullname . ' has been paid ' . $formFields['amount_paid']);
    }
}
