
@if(Session::has('version'))
    @extends('layouts.'.Session::get('version').'.adminpages')
@endif

@section('content')
    <main role="main" class="col-md-11 ml-sm-auto col-lg-11 pt-3 px-4">

      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
        <h1 class="h2">Dashboard</h1>
      </div>

      <div class="row">

          @if(Session::get('role') == 'superadministrator' || Session::get('role') == 'administrator')
            <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                  <a href="{{ route('users.index') }}">
                      <div class="info-box facebook-bg">
                          <i class="fa fa-cloud-download"></i>
                          <div class="count">{{$n_users}}</div>
                          <div class="title">Users</div>
                      </div>
                  </a>
              </div>
              <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                  <a href="{{ route('roles.index') }}">
                      <div class="info-box twitter-bg">
                          <i class="fa fa-shopping-cart"></i>
                          <div class="count">{{$n_roles}}</div>
                          <div class="title">Roles</div>
                      </div>
                  </a>
              </div>
              <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                  <a href="{{ route('permission.index') }}">
                      <div class="info-box teal-bg">
                          <i class="fa fa-thumbs-o-up"></i>
                          <div class="count">{{$n_perms}}</div>
                          <div class="title">Permissions</div>
                      </div>
                  </a>
              </div>
          @endif

          <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
              <a href="{{ route('users.index') }}">
                  <div class="info-box lime-bg">
                      <i class="fa fa-cubes"></i>
                      <div class="count">{{$n_logged}}</div>
                      <div class="title">Logged In</div>
                  </div>
              </a>
          </div>
        </div>
    </main>
  </div>
</div>
@endsection