<x-layout>
  <div class="mt-1">
    <h4>Dashboard</h4>
  </div>

  <a href="" class="text-white  btn btn-sm btn-secondary mb-1 ">Settings <i class="fa-solid fa-gear"></i></a>
  <a href="" class="text-white  btn btn-sm btn-secondary mb-1 ">Notification <i class="fa-solid fa-bell"></i></a>

  <x-add_btn :number="$number"/>
  
  @include('partials._search')
  
  <x-table :marketers="$marketers" :clients="$clients"/>

  <x-add_marketer :number="$number"/>
</x-layout>
