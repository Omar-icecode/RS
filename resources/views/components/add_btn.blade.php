@props(['number'])
<div class="text-end">
    <button
      class="btn btn-primary btn-sm"
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
    @elseif(count($number) > 0)
    <a href="/client" 
    class="btn btn-primary btn-sm"
    >
    <i class="fa-solid fa-plus"></i>
    add referred client
    </a>
    @endif

    <a href="/client" 
    class="btn btn-primary btn-sm"
    >
    <i class="fa fa-eye"></i>
     view all clients
    </a>
  </div>