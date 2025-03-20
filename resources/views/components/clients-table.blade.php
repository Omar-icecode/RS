@props(['clients'])

<div class="d-flex justify-content-end p-1">
  <a class=" me-3 btn btn-sm btn-secondary" id="refresh">refresh <i class="fa-solid fa-refresh"></i></a>
</div>
<div class="table-responsive table-container">
    <table class="table table-striped table-hover">
      <thead class="position-sticky top-0">
        <tr class="table-dark text-nowrap">
          <th>No#</th>
          <th>client's name</th>
          <th>contact</th>
          <th>address</th>
          <th>date attended</th>
          <th>service offered</th>
          <th>Amount Paid (Ghc)</th>
          <th>Referred By</th>
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
          <td><a href="/marketer/{{$clients[$i]->marketer_id}}" class="text-dark">{{$clients[$i]->referred_by}}</a></td>
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


  <script>
    let refreshBtn = document.getElementById('refresh');
    refreshBtn.addEventListener('click', () => {
      window.location.reload();
    })
  </script>