<x-layout>
    <a href="/" class="btn btn-secondary mt-2 btn-sm">back</a>
    <div class="text-center p-2"><h4>Marketer's Page</h4></div>
    <div
      class="container border my-2 rounded d-lg-flex justify-content-evenly p-2"
    >
      <p class="m-0"><strong>name of marketer: </strong> {{$marketer->fullname}}</p>
      <p class="m-0"><strong>serial no.: </strong>{{$marketer->serial_number}}</p>
      <p class="m-0"><strong>contact: </strong> {{$marketer->contact}}</p>
      <p class="m-0"><strong>total referral: </strong>{{$clients->count()}} </p>
    </div>

    <x-client-table :clients="$clients" :marketer="$marketer"/>
</x-layout>