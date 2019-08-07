<!DOCTYPE html>
<!-- saved from url=(0053)https://getbootstrap.com/docs/4.0/examples/dashboard/ -->
<html lang="{{ app()->getLocale() }}">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset='UTF-8'">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit='no'">
    <meta name="description" content="Clinic Management System">
    <meta name="author" content="A. S. Md. Ferdousul Haque">
    <meta name="keyword" content="Laravel, Admin, Adminpanel, Laratrust, Bootstrap">
    <link rel="icon" href="#">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'CMS') }} || AdminPanel</title>

    <!-- Bootstrap core CSS -->
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="{{ asset('css/dashboard.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">

    <link href="{{ asset('css/fontawesome/css/all.css') }}" rel="stylesheet">
    <link href="{{ asset('css/fontawesome/css/fontawesome.css') }}" rel="stylesheet">
    <link href="{{ asset('css/fontawesome/css/brands.css') }}" rel="stylesheet">
    <link href="{{ asset('css/fontawesome/css/solid.css') }}" rel="stylesheet">
    <link href="{{ asset('css/fontawesome/css/regular.css') }}" rel="stylesheet">
    <link href="{{ asset('css/fontawesome/css/svg-with-js.css') }}" rel="stylesheet">
    <link href="{{ asset('css/fontawesome/css/v4-shims.css') }}" rel="stylesheet">

</head>
<body>
    <div id="app">
        <div class="wrapper">
            <!-- Sidebar Holder -->
            <nav id="sidebar">
                <div class="sidebar-header">
                    <a href="{{ route('dashboard.index') }}">
                        <img src="{{ URL::to('/') }}/img/logo.png" id="logo" alt="">
                    </a>
                </div>
                <ul class="list-unstyled components">

                    @if(Session::get('role') == 'superadministrator' || Session::get('role') == 'administrator')
                        <li>
                            <a href="{{ route('dashboard.index') }}">
                                <i class="fa fa-tachometer-alt"></i>
                                <span>Dashboard</span>
                                <span class="badge badge-pill badge-warning">New</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('consultant.index') }}">
                                <i class="fa fa-user-md"></i>
                                <span>Consultant</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('assistant.index') }}">
                                <i class="fa fa-user"></i>
                                <span>Assistant</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('patient.index') }}">
                                <i class="fa fa-user-plus"></i>
                                <span>Patient</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('expanse.index') }}">
                                <i class="fa fa-user-plus"></i>
                                <span>Expanses</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('medicine.index') }}">
                                <i class="fa fa-user-plus"></i>
                                <span>Add Medicine</span>
                            </a>
                        </li>
                        <li>
                            <a href="#aclSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                                <i class="fa fa-unlock-alt"></i>
                                <span>ACL</span>
                            </a>
                            <ul class="collapse list-unstyled" id="aclSubmenu">
                                <li>
                                    <a href="{{ route('users.index') }}">
                                        <i class="fa fa-users"></i>
                                        <span>Users</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('roles.index') }}">
                                        <i class="fa fa-address-book-o"></i>
                                        <span>Roles</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('permission.index') }}">
                                        <i class="fa fa-plus-square-o"></i>
                                        <span>Permissions</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                    @endif
                    <li>
                        <a href="#settingSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                            <i class="fa fa-unlock-alt"></i>
                            <span>Setting</span>
                        </a>
                        <ul class="collapse list-unstyled" id="settingSubmenu">
                            <li>
                                <a href="{{ route('users.index') }}">
                                    <i class="fa fa-users"></i>
                                    <span>Profile</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('setting.theme.list') }}">
                                    <i class="fa fa-address-book-o"></i>
                                    <span>Theme</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    <i class="fa fa-plus-square-o"></i>
                                    <span>Logout</span>
                                </a>
                                <div>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        {{ csrf_field() }}
                                    </form>
                                </div>
                            </li>
                        </ul>
                    </li>
                </ul>
            </nav>

            <!-- Page Content Holder -->
            <div id="content">
                <nav class="navbar navbar-expand-lg navbar-light bg-light">
                    <div class="container-fluid">

                        <button type="button" id="sidebarCollapse" class="navbar-btn">
                            <span></span>
                            <span></span>
                            <span></span>
                        </button>

                        <div >
                            <a href="{{ route('logout') }}" id="navbarDropdown" role="button" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                <i class="fa fa-power-off"></i>
                                <span>{{ Auth::user()->name }}</span>
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    {{ csrf_field() }}
                                </form>
                            </div>
                        </div>
                    </div>
                </nav>

                @yield('content')

            </div>
        </div>

    <!-- Bootstrap core JavaScript
        ================================================== -->
        <!-- Placed at the end of the document so the pages load faster -->
        <script src="{{ asset('js/jquery-3.2.1.slim.min.js') }}"></script>
        <script src="{{ asset('js/popper.min.js') }}"></script>
        <script src="{{ asset('js/bootstrap.min.js') }}"></script>

        <script src="{{ asset('js/feather.min.js') }}"></script>

        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}"></script>
        <script src="{{ asset('js/script.js') }}"></script>

        <script type="text/javascript">
            feather.replace();
        </script>
    </div>
</body>

</html>
