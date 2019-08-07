@if(Session::has('version'))
  @extends('layouts.'.Session::get('version').'.adminpages')
@endif

@section('content')
   
    <main role="main" class="col-md-11 ml-sm-auto col-lg-11 pt-3 px-4">

      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 border-bottom">
        <h2>{{$title}}</h2>
        <a class="btn btn-sm btn-primary" href="{{route('users.create')}}">Add New User</a>
      </div>
      <div class="table-responsive">
        <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th>Username</th>
              <th>Email</th>
              <th>Role</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
              @foreach($users as $user)
                  <tr>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>
                    @foreach($user->roles as $r)
                        {{$r->display_name}}
                    @endforeach
                    </td>
                    <td>
                      <div class="btn-group">
                        <a class="btn btn-primary" href="{{ route('users.edit', ['id' => $user->id]) }}" class="btn btn-info btn-xs"><i class="fa fa-pencil" title="Role"></i> </a>
                        <a class="btn btn-danger" href="{{ route('users.show', ['id' => $user->id]) }}" class="btn btn-danger btn-xs"><i class="fa fa-trash-o" title="Delete"></i> </a>
                      </div>
                    </td>
                  </tr>
                  @endforeach
          </tbody>
        </table>
        {{ $users->links() }}
      </div>
    </main>
  </div>
</div>
@endsection