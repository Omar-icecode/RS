@props(['marketers','clients','number'])
<div class="d-md-flex gap-5 p-2">
  <h6>Total Number of Referrals: {{count($clients)}}</h6>

  @php
  $unpaid = 0;
  $paid = 0;
  for ($i=0; $i < $number->count(); $i++) { 
    $unpaid += $number[$i]->unpaid_amount;
    $paid += $number[$i]->amount_paid;
  }
  @endphp 

  <h6>Unpaid Referrals: {{$unpaid}}.00 GHc </h6>
  <h6>Paid Referrals: {{$paid}}.00 Ghc</h6>

</div>
<div class="d-flex justify-content-end">
  <a href="/" class=" me-3 btn btn-sm btn-secondary">refresh <i class="fa-solid fa-refresh"></i></a>
</div>
  
<div class="table-responsive table-container">
    <table class="table table-striped table-hover">
      <thead class="position-sticky top-0">
        <tr>
          <th colspan="2">
            <h4 class="d-inline text-nowrap">{{count($marketers)}} Marketer(s)</h4> 
          </th>
          <th colspan="5" class="text-center">
            @if(request('filterBy'))
            <h6 class="text-primary ms-5">Results for ({{request('filterBy')}})</h6>
            @endif
          </th>
          <th colspan="2">
            <form action="" class="d-flex flex-nowrap gap-1">
              <select name="filterBy" class="form-select" id="">
                <option selected disabled> filter by:</option>
                <option value="Paid Referrals">Paid Referrals</option>
                <option value="Unpaid Referrals">Unpaid Referrals</option>
                <option value="Referrals Only">Referrals Only</option>
                <option value="No Referrals Only">No Referrals Only</option>
              </select>
              <button class="btn btn-sm btn-outline-secondary text-nowrap">filter <i class="fa-solid fa-filter"></i></button>
            </form>
          </th>
        </tr>
        <tr class="table-dark text-nowrap">
          <th>No#</th>
          <th>Name</th>
          <th>Serial No.</th>
          <th>Contact</th>
          <th>Address</th>
          <th>No. of Referrals</th>
          <th>Unpaid Amount (Ghc)</th>
          <th>Amount Paid (Ghc)</th>
          <th>Date Registered</th>
        </tr>
      </thead>
      <tbody>
        @unless(count($marketers) == 0)
        @for($i = 0; $i < count($marketers); $i++)
        <tr class="details">
          <td hidden>{{$marketers[$i]->id}}</td>
          <td>{{$i+1}}</td>
          <td>{{$marketers[$i]->fullname}}</td>
          <td>{{$marketers[$i]->serial_number}}</td>
          <td>{{$marketers[$i]->contact}}</td>
          <td>{{$marketers[$i]->address}}</td>
          <td>{{$marketers[$i]->client()->count()}}</td>
          <td ><strong>{{$marketers[$i]->unpaid_amount}}</strong></td>
          <td><strong>{{$marketers[$i]->amount_paid}}</strong></td>
          <td>{{substr($marketers[$i]->created_at,0,10)}}</td>
        </tr>
        @endfor
        @else
        <tr class="table-info">
          <td colspan="9" class="text-center"><strong>No Marketer Found</strong></td>
        </tr>

        @endunless
      </tbody>
    </table>
  </div>
