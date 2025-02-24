@extends("dashboard")
@section("content")
<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
    <div class="card">
      <h5 class="card-header">Basic Table</h5>
      <div class="card-body">
        <div class="table-responsive">
          <table class="table table-striped table-bordered first">
            <thead>
              <tr>
                <th>Name</th>
                <th>email</th>
                <th>roll</th>
                <th colspan="2">action</th>
              </tr>
            </thead>
            <tbody>
                @forelse ($admins as $admin)
                <tr>
                    <td> {{$admin->name}} </td>
                    <td> {{$admin->email}} </td>
                    <td> {{$admin->role}} </td>
                    <td>
                        <form action="{{route("admin.destroy", $admin->id)}}" method="post">
                            @csrf
                            @method("DELETE")
                            <button type="submit" class="btn btn-danger">
                                <i class="fa-solid fa-trash"></i>
                            </button>
                        </form>
                    </td>
                    <td>
                        <form action="" method="POST">
                            @csrf
                            @method("PUT")
                            <button class="btn btn-warning">
                                <i class="fa-solid fa-pen-to-square"></i>
                            </button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td rowspan="5"> Not Fount any data </td>
                </tr>
                @endforelse
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
@endsection

