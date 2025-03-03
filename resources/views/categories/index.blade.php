@extends("dashboard")
@section("content")
<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">

    <div class="card">
      <div class="card-body">
        <div class="table-responsive">
          <table class="table table-striped table-bordered first">
            <thead>

              <tr>
                <th>Name</th>
                <th>status</th>
                <th colspan="2">action</th>
              </tr>
            </thead>
            <tbody>
                @forelse ($categories as $category)
                <tr>
                    <td> {{$category->name}} </td>
                    <td> {{$category->status}} </td>
                    <td>
                        <form action="{{route("categories.destroy", $category->id)}}" method="post">
                            @csrf
                            @method("DELETE")
                            <button type="submit" class="btn-danger text-sm rounded border-none">
                                <i class="fa-solid fa-trash"></i>
                            </button>
                        </form>
                    </td>
                    <td>
                        <form action="{{route("categories.edit" , $category->id)}}" method="GET">
                            @csrf
                            <button class="btn-warning">
                                <i class="fa-solid fa-pen-to-square"></i>
                            </button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="5" class="text-center"> Not Found any data </td>
                </tr>
                @endforelse
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
@endsection

