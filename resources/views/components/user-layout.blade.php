<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{asset("user/css/bootstrap.css")}}">
    <link rel="stylesheet" href="{{asset("user/css/style.css")}}">
    <script src="https://kit.fontawesome.com/e0462e4fee.js" crossorigin="anonymous"></script>
    <title>Baran</title>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-black bg-opacity-25">
    <div class="container-fluid">
        <a href="{{route("welcome")}}" class="navbar-brand text-white">Baran</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbar">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbar">
            <div class="d-flex justify-content-lg-center w-100 my-lg-0 my-3">
                <ul class="navbar-nav mb-2 mb-lg-0 d-flex gap-4">
                    @if(Session::get("user"))
                    <li class="nav-item">
                        <a href="{{route("buyMusic")}}" class="nav-link text-white">Muziek kopen</a>
                    </li>
                    @endif
                    <li class="nav-item">
                        <a href="{{route("contact")}}" class="nav-link text-white">Contact</a>
                    </li>
                    <li class="nav-item">
                        <a href="" class="nav-link text-white">Werken voor</a>
                    </li>
                </ul>
            </div>
            <div class="d-flex gap-2">
                @if(!Session::get("user"))
                <a href="{{route("login")}}" class="text-white">Inloggen/registreren</a>
                @else
                <div class="dropdown">
                    <a href="" class="text-white dropdown-toggle" data-bs-toggle="dropdown">Welkom {{Session::get("user")->firstName . " " . Session::get("user")->prefix . " " . Session::get("user")->lastName}}</a>
                    <ul class="dropdown-menu">
                        <li class="dropdown-item">
                            <a href="">Mijn profiel</a>
                        </li>
                        @if(Session::get("user")->permissionLevel == "1")
                        <li class="dropdown-item">
                            <a href="{{route("worker.dashboard")}}">Mijn dashboard</a>
                        </li>
                        @endif
                        @if(Session::get("user")->permissionLevel == "2")
                            <li class="dropdown-item">
                                <a href="{{route("admin.dashboard")}}">Mijn dashboard</a>
                            </li>
                        @endif
                        @if(Session::get("user")->permissionLevel == "0")
                            <li class="dropdown-item">
                                <a href="{{route("getAllOrders")}}">Mijn orders</a>
                            </li>
                        @endif
                        <li class="dropdown-item">
                            <a href="{{route("logout")}}">Loguit</a>
                        </li>
                    </ul>
                </div>
                @endif
            </div>
        </div>
    </div>
</nav>
<br>
{{$slot}}
<x-user-footer></x-user-footer>
