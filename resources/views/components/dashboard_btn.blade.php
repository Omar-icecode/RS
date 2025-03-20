@props(['number'])
<div class="text-end">
    <button
      class="btn btn-primary btn-sm my-1"
      data-bs-toggle="modal"
      data-bs-target="#add_marketer"
    >
    <i class="fa-solid fa-plus"></i>
      add new marketer
    </button>
    @if(count($number) == 0)
    <a href="/client" 
      class="btn btn-primary btn-sm disabled"
    >
    <i class="fa-solid fa-plus"></i>
      add referred client
    </a>
    <a href="/clients" 
    class="btn btn-primary btn-sm mt-1 disabled"
    >
    <i class="fa fa-eye"></i>
     view all clients
    </a>

    @elseif(count($number) > 0)
    <a href="/client" 
    class="btn btn-primary btn-sm "
    >
    <i class="fa-solid fa-plus"></i>
    add referred client
    </a>
    <a href="/clients" 
    class="btn btn-primary btn-sm mt-1"
    >
    <i class="fa fa-eye"></i>
     view all clients
    </a>
    @endif

  </div>