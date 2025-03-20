<x-layout>
    <div class="my-1">
        <a href="/" class="btn btn-secondary mt-2 btn-sm">back</a>
        <h4 class="mt-2">User Accounts</h4>
    </div>

    <button class="text-white  btn btn-sm btn-primary mb-1 " data-bs-toggle="modal" data-bs-target="#newUser">New User <i class="fa-solid fa-user-plus"></i></button>

    <div class="dorpdown d-inline-block">
        <a href="" class="text-white  btn btn-sm btn-secondary mb-1 " data-bs-toggle="dropdown">Settings <i class="fa-solid fa-gear"></i></a>
        <ul class="dropdown-menu">
          <li><a href="" class="dropdown-item">Rate</a></li>
          <li><a href="/" class="dropdown-item">Marketers</a></li>
          <li><hr class="dropdown-divider"></li>
          <li><a href="" class="dropdown-item">Logout</a></li>
        </ul>
    </div>

    <form action="">
        <div class="d-flex justify-content-end gap-2 my-3">
        <input type="text" name="searchSerialNo" placeholder="search user" class="form-control">
        <input type="submit" value="search" class="btn btn-primary">
      </div>
    </form>

    <x-users_table :users="$users"/>

    <x-user_modal />

</x-layout>
  