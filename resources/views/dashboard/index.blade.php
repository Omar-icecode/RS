<x-layout>
  <div class="mt-1 d-flex justify-content-between">
    <h4>Dashboard</h4>
  </div>


  <div class="dorpdown d-inline-block">
    <a href="" class="text-white  btn btn-sm btn-secondary mb-1 " data-bs-toggle="dropdown">Settings <i class="fa-solid fa-gear"></i></a>
    <ul class="dropdown-menu">
      @if(auth()->user()->access_type === "Full Access")
      <li><a href="" class="dropdown-item"> <i class="fa fa-money"></i> Rate</a></li>
      <li><a href="accounts" class="dropdown-item"><i class="fa fa-users"></i> User Accounts</a></li>
      @elseif(auth()->user()->access_type === "Admin Access")
      <li><a href="" class="dropdown-item disabled"> <i class="fa fa-money"></i> Rate</a></li>
      <li><a href="accounts" class="dropdown-item disabled"><i class="fa fa-users"></i> User Accounts</a></li>
      @endif
      <li><hr class="dropdown-divider"></li>
      <li class="dropdown-item">
        <form action="/logout" method="POST">
          @csrf
          <button type="submit" class="btn btn-md p-0"><i class="fa fa-sign-out"></i> Logout </button>
        </form>
      </li>
    </ul>
  </div>
  <a href="" class="text-white  btn btn-sm btn-secondary mb-1 ">Notification <i class="fa-solid fa-bell"></i></a>

  <x-dashboard_btn :number="$number"/>
  
  @include('partials._search')
  
  <x-table :number="$number" :marketers="$marketers" :clients="$clients"/>

  <x-add_marketer :number="$number"/>
</x-layout>
