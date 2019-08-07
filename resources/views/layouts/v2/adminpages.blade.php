<!DOCTYPE html>
<!-- saved from url=(0053)https://getbootstrap.com/docs/4.0/examples/dashboard/ -->
<html lang="{{ app()->getLocale() }}">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset='UTF-8'">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit='no'">
    <meta name="description" content="Clinic Management System">
    <meta name="author" content="A. S. Md. Ferdousul Haque">
    <meta name="keyword" content="Laravel, Admin, Bootstrap">
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

            <!-- Page Content Holder -->
            <div id="content">
                <nav class="navbar navbar-v2 navbar-expand-lg navbar-dark static-top">
                    <div class="container">
                        <a href="{{ route('dashboard.index') }}">
                            <img src="{{ URL::to('/') }}/img/logo.png" alt="">
                        </a>
                        <div class="collapse navbar-collapse" id="navbarResponsive">
                            <ul class="nav ml-auto">

                                @if(Session::get('role') == 'superadministrator' || Session::get('role') == 'administrator')
                                    <li class="nav-item active">
                                        <a href="{{ route('patient.index') }}">
                                            <img src="{{ URL::to('/') }}/img/patient.png" alt="">
                                            <p>Patients</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ route('medicine.index') }}">
                                            <img src="{{ URL::to('/') }}/img/medicine.png" alt="">
                                            <p>Add Medicine</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ route('users.index') }}">
                                            <img src="{{ URL::to('/') }}/img/users 1.png" alt="">
                                            <p>Staff</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ route('expanse.index') }}">
                                            <img src="{{ URL::to('/') }}/img/money 2.png" alt="">
                                            <p>Expanses</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ route('appointment.index') }}">
                                            <img src="{{ URL::to('/') }}/img/appointment 2.png" alt="">
                                            <p>Appointment</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ route('invoice.index') }}">
                                            <img src="{{ URL::to('/') }}/img/reports 2.png" alt="">
                                            <p>Reports</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ route('users.index') }}">
                                            <img src="{{ URL::to('/') }}/img/users 2.png" alt="">
                                            <p>Users</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ route('dashboard.index') }}">
                                            <img src="{{ URL::to('/') }}/img/backups 3.png" alt="">
                                            <p>Backups</p>
                                        </a>
                                    </li>
                                    <li class="nav-item dropdown" style="float:right;">
                                        <a data-toggle="dropdown"  href="{{ route('dashboard.index') }}">
                                            <img src="{{ URL::to('/') }}/img/acl5.png" alt="">
                                            <p>ACL</p>
                                        </a>
                                        <ul class="dropdown-menu">
                                            <li>
                                                <a href="{{ route('users.index') }}">Users</a>
                                            </li>
                                            <div class="dropdown-divider"></div>
                                            <li>
                                                <a href="{{ route('roles.index') }}">Roles</a>
                                            </li>
                                            <div class="dropdown-divider"></div>
                                            <li>
                                                <a href="{{ route('permission.index') }}">Permissions</a>
                                            </li>
                                        </ul>
                                    </li>
                                @endif

                                <li class="nav-item dropdown" >
                                    <a data-toggle="dropdown" >
                                        <img src="{{ URL::to('/') }}/img/setting3.png" alt="">
                                        <p>Setting</p>
                                    </a>

                                    <ul class="dropdown-menu">
                                        <li>
                                            <a href="{{ route('users.index') }}">Profile</a>
                                        </li>
                                        <div class="dropdown-divider"></div>
                                        <li>
                                            <a href="{{ route('setting.theme.list') }}">Theme</a>
                                        </li>
                                        <div class="dropdown-divider"></div>
                                        <li>
                                            <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
                                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                                {{ csrf_field() }}
                                            </form>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
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

        <script>
            feather.replace();
        </script>
    </div>
</body>

</html>
