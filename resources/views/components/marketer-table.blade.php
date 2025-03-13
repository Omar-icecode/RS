@props(['clients', 'marketer'])
<div class="d-md-flex gap-5 p-2">
  <h6>Unpaid Referrals: {{$marketer->unpaid_amount}} GHc</h6>
  <h6>Paid Referrals: {{$marketer->amount_paid}} Ghc</h6>
</div>
<div class="d-flex justify-content-end p-1">
  <a class=" me-3 btn btn-sm btn-secondary" id="refresh">refresh <i class="fa-solid fa-refresh"></i></a>
</div>
<div class="table-responsive table-container">
    <table class="table table-striped table-hover">
      <thead class="position-sticky top-0">
        <tr>
          @if($marketer->unpaid_amount <= 0)
          <td> 
            <button class="btn btn-sm btn-success text-nowrap" disabled data-bs-target="#pay" data-bs-toggle="modal">Pay {{$marketer->unpaid_amount}} GHc</button>
          </td>
          @else
          <td>
            <button class="btn btn-sm btn-success text-nowrap" data-bs-target="#pay" data-bs-toggle="modal">Pay {{$marketer->unpaid_amount}} GHc</button>
          </td>
          @endif
        </tr>
        <tr class="table-dark text-nowrap">
          <th>No#</th>
          <th>client's name</th>
          <th>contact</th>
          <th>address</th>
          <th>date attended</th>
          <th>service offered</th>
          <th>Amount Paid (Ghc)</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
        @unless(count($clients) == 0)
        @for($i=0; $i < count($clients); $i++)
        <tr>
          <td>{{$i+1}}</td>
          <td>{{$clients[$i]->fullname}}</td>
          <td>{{$clients[$i]->contact}}</td>
          <td>{{$clients[$i]->address}}</td>
          <td>{{substr($clients[$i]->date_attended,0,10)}}</td>
          <td>{{$clients[$i]->service_offered}}</td>
          <td>{{$clients[$i]->amount_paid}}</td>
          <td><button class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#clientUpdate">update</button></td>
        </tr>
        @endfor
        @else
        <tr class="table-info">
          <td colspan="8" class="text-center"><strong>No Clients Referred</strong></td>
        </tr>

        @endunless
      </tbody>
    </table>
  </div>

  <div class="modal fade" id="clientUpdate">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Client Update</h4>
          <button class="btn-close" data-bs-dismiss="modal"></button>
        </div>
        <div class="modal-body">
          <form action="">
            <label for="service" class="form-label">Service Offered</label>
            <select name="" id="service" class="form-select">
                <option selected disabled>Select Service</option>
                <option value="Extraction">Extraction</option>
                <option Value="Scaling & Polishing">Scaling and Polishing</option>
            </select>
            <label for="amount" class="form-label mt-2">Amount Paid</label>
            <input type="text" class="form-control">
            <button class="btn btn-primary  mt-2">Update</button>
          </form>
        </div>
        <div class="modal-footer">
          <button class="btn btn-danger" data-bs-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>

  <div class="modal" id="pay">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Enter amount</h4>
        </div>
        <div class="modal-body">
          <form action="/pay/{{$marketer->id}}" method='POST'>
            @csrf
            @method('PUT')
            <label for="" class="form-label">Pay this amount:</label>
            <input type="number" min="0" max="{{$marketer->unpaid_amount}}" name="amount_paid" value="{{$marketer->unpaid_amount}}" placeholder="enter amount paid" class="form-control mb-2">
            @error('amount_paid')
            <p class="text-danger text-xs mt-1">{{$message}}</p>
            @enderror
            <button class="btn btn-success">confirm</button>
          </form>
        </div> 
        <div class="modal-footer">
          <button class="btn btn-danger" data-bs-dismiss="modal">close</button>
        </div>
      </div>
    </div>
  </div>

  <script>
    let refreshBtn = document.getElementById('refresh');
    refreshBtn.addEventListener('click', () => {
      window.location.reload();
    })
  </script>