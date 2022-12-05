<x-user-layout>
    <div class="container">
        <div class="row">
            <img class="col-6 d-md-block d-none" src="{{asset("user/images/background.jpg")}}" alt="">
            <div class="col-md-6 col-10 d-flex flex-column align-items-center">
                @if($message = Session::get("success"))
                    <div class="alert alert-success w-100">
                        <h5>{{$message}}</h5>
                    </div>
                @endif
                @if($message = Session::get("fail"))
                    <div class="alert alert-danger w-100">
                        <h5>{{$message}}</h5>
                    </div>
                @endif
                <form action="" method="post" class="w-100 d-flex flex-column gap-4">
                    @csrf
                    @method("POST")
                    <div class="form-group">
                        <label for="">Email:</label>
                        <input type="text" value="{{old("email")}}" name="email" class="form-control" placeholder="Email">
                        <span class="text-danger">@error("email"){{$message}}@enderror</span>
                    </div>
                    <div class="form-group">
                        <label for="">Wachtwoord:</label>
                        <input type="password" class="form-control" name="password" value="{{old("password")}}" placeholder="Wachtwoord">
                        <span class="text-danger">@error("password"){{$message}}@enderror</span>
                    </div>
                    <input type="submit" value="Login" class="btn btn-primary">
                    <div class="d-flex justify-content-between">
                        <a href="">Wachtwoord vergeten?</a>
                        <a href="{{route("registerView")}}" class="">Registeren</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-user-layout>
