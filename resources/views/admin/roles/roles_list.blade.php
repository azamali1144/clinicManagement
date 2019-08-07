@if(Session::has('version'))
    @extends('layouts.'.Session::get('version').'.adminpages')
@endif

@section('content')
<main role="main" class="col-md-11 ml-sm-auto col-lg-11 pt-3 px-4">

    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 border-bottom">
        <h2>{{$title}}</h2>
        <a class="btn btn-sm btn-primary" href="{{route('roles.index')}}">Back</a>
    </div>
      <div class="table-responsive">
        <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th>Role Display</th>
              <th>Role Description</th>
              <th>Role</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
              @foreach($roles as $role)
              <tr>
                <td>{{ $role->display_name }}</td>
                <td>{{ $role->description }}</td>
                <td>{{ $role->name }}</td>
                <td>
                  <div class="btn-group">
                    <a class="btn btn-primary" href="{{ route('roles.edit', ['id' => $role->id]) }}" class="btn btn-info btn-xs"><i class="fa fa-pencil" title="Edit"></i> </a>
                    <a class="btn btn-danger" href="{{ route('roles.show', ['id' => $role->id]) }}" class="btn btn-danger btn-xs"><i class="fa fa-trash-o" title="Delete"></i> </a>
                  </div>
                </td>
              </tr>
              @endforeach
          </tbody>
        </table>
        {{ $roles->links() }}
      </div>
    </main>
  </div>
</div>
@endsection