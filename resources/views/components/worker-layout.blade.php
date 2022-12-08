<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="{{asset("admin/css/sb-admin-2.css")}}">
    <link rel="stylesheet" href="{{asset("admin/css/style.css")}}">
    <script src="https://kit.fontawesome.com/e0462e4fee.js" crossorigin="anonymous"></script>
    <title>Admin</title>
</head>
<body>
<div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

        <!-- Sidebar - Brand -->
        <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{route("worker.dashboard")}}">
            <div class="sidebar-brand-icon rotate-n-15">
                <i class="fa-solid fa-headphones"></i>
            </div>
            <div class="sidebar-brand-text mx-3">Baran</div>
        </a>

        <!-- Divider -->
        <hr class="sidebar-divider my-0">

        <!-- Nav Item - Dashboard -->
        <li class="nav-item {{Route::is("worker.dashboard") ? "active" : ""}}">
            <a class="nav-link" href="{{route("worker.dashboard")}}">
                <i class="fas fa-fw fa-tachometer-alt"></i>
                <span>Dashboard</span></a>
        </li>

{{--        <li class="nav-item {{Route::is("admin.workers") || Route::is("admin.users") || Route::is("admin.singleUser") || Route::is("admin.singleWorker") ? "active" : ""}}">--}}
{{--            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo">--}}
{{--                <i class="fa-solid fa-user"></i>--}}
{{--                <span>Gebruikers</span>--}}
{{--            </a>--}}
{{--            <div id="collapseTwo" class="collapse" data-parent="#accordionSidebar">--}}
{{--                <div class="bg-white py-2 collapse-inner rounded">--}}
{{--                    <a class="collapse-item" href="{{route("admin.users")}}">Klanten</a>--}}
{{--                    <a class="collapse-item" href="{{route("admin.workers")}}">Medewerkers</a>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </li>--}}
        <li class="nav-item {{Route::is("worker.getOrders") || Route::is("worker.getSingleOrder") ? "active" : ""}}">
            <a class="nav-link" href="{{route("worker.getOrders")}}">
                <i class="fa-solid fa-box"></i>
                <span>Mijn opdrachten</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#">
                <i class="fa-solid fa-music"></i>
                <span>Mijn nummers</span>
            </a>
        </li>

{{--        <li class="nav-item {{Route::is("admin.getContactMessages") ? "active" : ""}}">--}}
{{--            <a href="{{route("admin.getContactMessages")}}" class="nav-link">--}}
{{--                <i class="fa-solid fa-envelope"></i>--}}
{{--                <span>Contact berichten</span>--}}
{{--            </a>--}}
{{--        </li>--}}

        {{--        <!-- Divider -->--}}
        {{--        <hr class="sidebar-divider">--}}

        {{--        <!-- Heading -->--}}
        {{--        <div class="sidebar-heading">--}}
        {{--            Addons--}}
        {{--        </div>--}}

        {{--        <!-- Nav Item - Pages Collapse Menu -->--}}
        {{--        <li class="nav-item">--}}
        {{--            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages"--}}
        {{--               aria-expanded="true" aria-controls="collapsePages">--}}
        {{--                <i class="fas fa-fw fa-folder"></i>--}}
        {{--                <span>Pages</span>--}}
        {{--            </a>--}}
        {{--            <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">--}}
        {{--                <div class="bg-white py-2 collapse-inner rounded">--}}
        {{--                    <h6 class="collapse-header">Login Screens:</h6>--}}
        {{--                    <a class="collapse-item" href="login.html">Login</a>--}}
        {{--                    <a class="collapse-item" href="register.html">Register</a>--}}
        {{--                    <a class="collapse-item" href="forgot-password.html">Forgot Password</a>--}}
        {{--                    <div class="collapse-divider"></div>--}}
        {{--                    <h6 class="collapse-header">Other Pages:</h6>--}}
        {{--                    <a class="collapse-item" href="404.html">404 Page</a>--}}
        {{--                    <a class="collapse-item" href="blank.html">Blank Page</a>--}}
        {{--                </div>--}}
        {{--            </div>--}}
        {{--        </li>--}}

        {{--        <!-- Nav Item - Charts -->--}}
        {{--        <li class="nav-item">--}}
        {{--            <a class="nav-link" href="charts.html">--}}
        {{--                <i class="fas fa-fw fa-chart-area"></i>--}}
        {{--                <span>Charts</span></a>--}}
        {{--        </li>--}}

        {{--        <!-- Nav Item - Tables -->--}}
        {{--        <li class="nav-item">--}}
        {{--            <a class="nav-link" href="tables.html">--}}
        {{--                <i class="fas fa-fw fa-table"></i>--}}
        {{--                <span>Tables</span></a>--}}
        {{--        </li>--}}

    </ul>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

        <!-- Main Content -->
        <div id="content">

            <!-- Topbar -->
            <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                <!-- Sidebar Toggle (Topbar) -->
                <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                    <i class="fa fa-bars"></i>
                </button>

                <!-- Topbar Search -->
                {{--                <form--}}
                {{--                    class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">--}}
                {{--                    <div class="input-group">--}}
                {{--                        <input type="text" class="form-control bg-light border-0 small" placeholder="Zoeken...">--}}
                {{--                        <div class="input-group-append">--}}
                {{--                            <button class="btn btn-primary" type="button">--}}
                {{--                                <i class="fas fa-search fa-sm"></i>--}}
                {{--                            </button>--}}
                {{--                        </div>--}}
                {{--                    </div>--}}
                {{--                </form>--}}

                <!-- Topbar Navbar -->
                <ul class="navbar-nav ml-auto">

                    <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                    <li class="nav-item dropdown no-arrow d-sm-none">
                        <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
                           data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-search fa-fw"></i>
                        </a>
                        <!-- Dropdown - Messages -->
                        <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                             aria-labelledby="searchDropdown">
                            <form class="form-inline mr-auto w-100 navbar-search">
                                <div class="input-group">
                                    <input type="text" class="form-control bg-light border-0 small"
                                           placeholder="Search for..." aria-label="Search"
                                           aria-describedby="basic-addon2">
                                    <div class="input-group-append">
                                        <button class="btn btn-primary" type="button">
                                            <i class="fas fa-search fa-sm"></i>
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </li>

                    <!-- Nav Item - Alerts -->
                    <li class="nav-item dropdown no-arrow mx-1">
                        <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button"
                           data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-bell fa-fw"></i>
                            <!-- Counter - Alerts -->
                            <span class="badge badge-danger badge-counter">3+</span>
                        </a>
                        <!-- Dropdown - Alerts -->
                        <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in">
                            <h6 class="dropdown-header">
                                Notificaties
                            </h6>
                            <a class="dropdown-item d-flex align-items-center" href="#">
                                <div class="mr-3">
                                    <div class="icon-circle bg-primary">
                                        <i class="fas fa-file-alt text-white"></i>
                                    </div>
                                </div>
                                <div>
                                    <div class="small text-gray-500">December 12, 2019</div>
                                    <span class="font-weight-bold">A new monthly report is ready to download!</span>
                                </div>
                            </a>
                            <a class="dropdown-item d-flex align-items-center" href="#">
                                <div class="mr-3">
                                    <div class="icon-circle bg-success">
                                        <i class="fas fa-donate text-white"></i>
                                    </div>
                                </div>
                                <div>
                                    <div class="small text-gray-500">December 7, 2019</div>
                                    $290.29 has been deposited into your account!
                                </div>
                            </a>
                            <a class="dropdown-item d-flex align-items-center" href="#">
                                <div class="mr-3">
                                    <div class="icon-circle bg-warning">
                                        <i class="fas fa-exclamation-triangle text-white"></i>
                                    </div>
                                </div>
                                <div>
                                    <div class="small text-gray-500">December 2, 2019</div>
                                    Spending Alert: We've noticed unusually high spending for your account.
                                </div>
                            </a>
                            <a class="dropdown-item text-center small text-gray-500" href="#">Show All Alerts</a>
                        </div>
                    </li>

                    <!-- Nav Item - Messages -->
{{--                    <li class="nav-item dropdown no-arrow mx-1">--}}
{{--                        <a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button"--}}
{{--                           data-toggle="dropdown">--}}
{{--                            <i class="fas fa-envelope fa-fw"></i>--}}
{{--                            <!-- Counter - Messages -->--}}
{{--                            <span class="badge badge-danger badge-counter">{{count($contacts)}}</span>--}}
{{--                        </a>--}}
{{--                        <!-- Dropdown - Messages -->--}}
{{--                        <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"--}}
{{--                             aria-labelledby="messagesDropdown">--}}
{{--                            <h6 class="dropdown-header">--}}
{{--                                Berichten--}}
{{--                            </h6>--}}
{{--                            @foreach($contacts as $contact)--}}
{{--                                <a class="dropdown-item d-flex align-items-center" href="{{route("admin.getSingleContactMessage", $contact->id)}}">--}}
{{--                                    <div class="font-weight-bold">--}}
{{--                                        <div class="text-truncate">{{$contact->message}}</div>--}}
{{--                                        <div class="small text-gray-500">{{$contact->firstName . " " . $contact->prefix . " " . $contact->lastName}}</div>--}}
{{--                                    </div>--}}
{{--                                </a>--}}
{{--                            @endforeach--}}
{{--                            <a class="dropdown-item text-center small text-gray-500" href="{{route("admin.getContactMessages")}}">Alle berichten</a>--}}
{{--                        </div>--}}
{{--                    </li>--}}

                    <div class="topbar-divider d-none d-sm-block"></div>

                    <!-- Nav Item - User Information -->
                    <li class="nav-item dropdown no-arrow">
                        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                           data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <span class="mr-2 d-none d-lg-inline text-gray-600 small">{{Session::get("user")->firstName . " " . Session::get("user")->prefix . " " . Session::get("user")->lastName}}</span>
                            <img class="img-profile rounded-circle" src="{{asset("admin/images/default.jpg")}}">
                        </a>
                        <!-- Dropdown - User Information -->
                        <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                             aria-labelledby="userDropdown">
                            <a class="dropdown-item" href="#">
                                <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                Profiel
                            </a>
                            <a class="dropdown-item" href="#">
                                <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                                Settings
                            </a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="{{route("logout")}}">
                                <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                Logout
                            </a>
                        </div>
                    </li>

                </ul>
            </nav>

            <div class="container-fluid">
                {{$slot}}
            </div>
        </div>

    </div>

</div>
<x-admin-footer></x-admin-footer>
