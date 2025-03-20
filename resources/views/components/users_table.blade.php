@props(['users'])
<div class="table-responsive table-container">
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Username</th>
                <th>Access Type</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $user)
            <tr>
                <td>{{$user->username}}</td>
                <td>{{$user->access_type}}</td>
                <td>
                    <a href='/update_user/{{$user->id}}' class="btn btn-primary btn-sm">update user</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
