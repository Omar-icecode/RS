<div class="modal fade" id="newUser">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">
                    Add New User
                </h4>
            </div>
            <div class="modal-body">
                <form action="/users" method="POST">
                    @csrf
                    <div class='mb-3'>
                        <label for="" class="form-label">Username</label>
                        <input type="text" name='username' class='form-control' placeholder="enter username">    
                        @error('username')
                        <p class="text-danger text-xs mt-1">{{$message}}</p>
                        @enderror
                    </div>
                    <div class='mb-3'>
                        <label for="" class="form-label">Password</label>
                        <input type="password" name="password" class='form-control' placeholder="enter password">    
                        @error('password')
                        <p class="text-danger text-xs mt-1">{{$message}}</p>
                        @enderror
                    </div>
                    <div class='mb-3'>
                        <label for="" class="form-label">Confirm Password</label>
                        <input type="password" name="password_confirmation" class='form-control' placeholder="confirm password">
                        @error('password_confirmation')
                        <p class="text-danger text-xs mt-1">{{$message}}</p>
                        @enderror    
                    </div>
                    <div class='mb-3'>
                        <label for="" class="form-label">Access Type</label>
                        <select name="access_type" class="form-select">
                            <option value="" disabled selected>select access type</option>
                            <option value="Full Access">Full Access</option>
                            <option value="Admin Access">Admin Access</option>
                        </select>
                        @error('access-type')
                        <p class="text-danger text-xs mt-1">{{$message}}</p>
                        @enderror
                    </div>

                    <input type="submit" value='Add User' class='btn btn-primary mt-2'>
                </form>
            </div>
            <div class="modal-footer">
                <button class="btn btn-danger" data-bs-dismiss='modal'>Close</button>
            </div>
        </div>
    </div>
</div>
