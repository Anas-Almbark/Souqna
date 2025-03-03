@extends("dashboard")
@section("content")

<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
  @include("dashboardComponents.message")
    <div class="card">
      <div class="card-body">
        <div class="table-responsive">
          <table class="table table-striped table-bordered first">
            <thead>
              <tr>
                <th>Name</th>
                <th>email</th>
                <th>role</th>
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
                            <button type="submit" class="btn-danger text-sm rounded border-none">
                                <i class="fa-solid fa-trash"></i>
                            </button>
                        </form>
                    </td>
                    <td>
                        <form action="{{route("admin.edit" , $admin->id)}}" method="GET">
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

