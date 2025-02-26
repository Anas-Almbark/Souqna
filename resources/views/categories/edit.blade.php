@extends("dashboard")
@section("content")
<div class="card w-75 py-2 m-auto">
    <div class="card-body">
        <h3> Change Name </h3>
        <form action="{{route("categories.update" , $category->id)}}" method="POST">
            @csrf
            @method("PUT")
            <div class="form-group">
                <label for="name" class="col-form-label">Name</label>
                <input id="name" value="{{$category->name}}" type="text" name="name" class="form-control">
            </div>
            <button type="submit" class="btn btn-primary"> Update </button>
        </form>
    </div>
</div>
@endsection
