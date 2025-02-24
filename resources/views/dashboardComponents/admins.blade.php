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
                <th rowspan="2">action</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>Gavin Joyce</td>
                <td>Developer</td>
                <td>Edinburgh</td>
                <td>42</td>
                <td>2010/12/22</td>
                <td>$92,575</td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
@endsection

