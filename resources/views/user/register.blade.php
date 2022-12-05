<x-user-layout>
    <div class="container">
        <div class="row justify-content-lg-start justify-content-center">
            <img class="col-4 d-lg-block d-none" src="{{asset("user/images/background.jpg")}}" alt="">
            <div class="col-lg-8 col-10">
                <div>
                    <p>De velden met een <span class="text-danger">*</span> zijn verplicht.</p>
                </div>
                <form action="" class="w-100 row gap-4 justify-content-lg-start justify-content-center" method="post">
                    @csrf
                    @method("POST")
                    <div class="form-group col-lg-5 col-10">
                        <label for=""><span class="text-danger">*</span>Voornaam:</label>
                        <input type="text" value="{{old("firstname")}}" name="firstName" class="form-control" placeholder="Voornaam">
                        <span class="text-danger">@error("firstName"){{$message}}@enderror</span>
                    </div>
                    <div class="form-group col-lg-5 col-10">
                        <label for="">Tussenvoegsel:</label>
                        <input type="text" name="prefix" value="{{old("prefix")}}" class="form-control" placeholder="Tussenvoegsel">
                    </div>
                    <div class="form-group col-lg-5 col-10">
                        <label for=""><span class="text-danger">*</span>Achternaam:</label>
                        <input type="text" name="lastName" value="{{old("lastName")}}" class="form-control" placeholder="Voornaam">
                        <span class="text-danger">@error("lastName"){{$message}}@enderror</span>
                    </div>
                    <div class="form-group col-lg-5 col-10">
                        <label for=""><span class="text-danger">*</span>Email adress:</label>
                        <input type="text" name="email" value="{{old("email")}}" class="form-control" placeholder="Email">
                        <span class="text-danger">@error("email"){{$message}}@enderror</span>
                    </div>
                    <div class="form-group col-lg-5 col-10">
                        <label for=""><span class="text-danger">*</span>Wachtwoord:</label>
                        <input type="password" name="password" value="{{old("password")}}" class="form-control" placeholder="Wachtwoord">
                        <span class="text-danger">@error("password"){{$message}}@enderror</span>
                    </div>
                    <div class="form-group col-lg-5 col-10">
                        <label for=""><span class="text-danger">*</span>Wachtwoord herhalen:</label>
                        <input type="password" name="repeatPassword" value="{{old("repeatPassword")}}" class="form-control" placeholder="Wachtwoord herhalen">
                        <span class="text-danger">@error("repeatPassword"){{$message}}@enderror</span>
                    </div>
                    <input type="submit" value="Registreren" class="btn btn-primary">
                    <a href="{{route("login")}}" class="">Login</a>
                </form>
            </div>
        </div>
    </div>
</x-user-layout>
