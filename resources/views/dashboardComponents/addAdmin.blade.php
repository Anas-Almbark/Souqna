@extends("dashboard")
@section("content")
<div class="card w-75 py-2 m-auto">
    <h5 class="card-header">Basic Form</h5>
    <div class="card-body">
        <form action="{{route("admin.store")}}" method="POST">
            @csrf
            <div class="form-group">
                <label for="full-name" class="col-form-label">Full Name</label>
                <input id="full-name" type="text" name="name" class="form-control">
            </div>
            <div class="form-group">
                <label for="inputEmail">Email address</label>
                <input id="inputEmail" type="email" name="email" placeholder="name@example.com" class="form-control">
            </div>
            <div class="form-group">
                <label for="inputPassword">Password</label>
                <input id="inputPassword" type="password" name="password" placeholder="Password" class="form-control">
            </div>
            <div class="form-group">
                <label for="inputPassword">Confirm Password</label>
                <input id="inputPassword" type="password" name="confirm_password" placeholder="Password" class="form-control">
            </div>
            <div class="form-group">
                <select name="role" class="w-100 p-2 mt-2">
                    <option value="superAdmin">Super Admin</option>
                    <option value="Admin" selected>Admin</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary"> add </button>
        </form>
    </div>
</div>
@endsection
