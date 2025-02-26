@extends("dashboard")
@section("content")
<div class="card w-75 py-2 m-auto">
    <div class="card-body">
        <h3> Change Name </h3>
        <form action="{{route("admin.update" , $admin->id)}}" method="POST">
            @csrf
            @method("PUT")
            <div class="form-group">
                <label for="full-name" class="col-form-label">Full Name</label>
                <input id="full-name" value="{{$admin->name}}" type="text" name="name" class="form-control">
            </div>
            <button type="submit" class="btn btn-primary"> Update </button>
        </form>
    </div>
</div>
<div class="card w-75 py-2 mt-5 mx-auto">
    <div class="card-body">
        <h3> Change Password </h3>
        <form action="{{route("admin.updatePass" , $admin->id)}}" method="POST">
            @csrf
            @method("PUT")
            <div class="form-group">
                <label for="inputPassword">Password</label>
                <input id="inputPassword" type="password" name="password" placeholder="Password" class="form-control">
            </div>
            <div class="form-group">
                <label for="inputPassword">Confirm Password</label>
                <input id="inputPassword" type="password" name="password_confirmation" placeholder="Password" class="form-control">
            </div>
            <button type="submit" class="btn btn-primary"> Update </button>
        </form>
    </div>
</div>
@endsection
