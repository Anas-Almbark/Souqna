@extends("dashboard")
@section("content")
<div class="card w-75 py-2 m-auto">
    <div class="card-body">
        <form action="{{route("categories.store")}}" method="POST">
            @csrf
            <div class="form-group">
                <label for="inputName">Name</label>
                <input id="inputName" type="text" name="name" placeholder="Name" class="form-control">
            </div>
            <button type="submit" class="btn btn-primary"> Add </button>
        </form>
    </div>
</div>
@endsection
