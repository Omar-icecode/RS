<x-layout>
    
    <div class="card login m-auto mt-5">
        <div class="card-header">
            <h4 class='text-primary'>Login</h4>
        </div>
        <div class="card-body">
            <form action="users/authenticate" method="POST">
              @csrf
                <input type="text" class="form-control mb-3" name="username" placeholder="username">
                @error('username')
                  <p class="text-xs text-danger">{{$message}}</p>
                @enderror
                <input type="password" class="form-control mb-3" name="password" placeholder="password">
                <button class="btn btn-primary">Login</button>
            </form>
        </div>
    </div>
  </body>
</x-layout>


