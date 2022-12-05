<x-user-layout>
    <img src="{{asset("user/images/background2.jpg")}}" class="backgroundImage" alt="">
    <div class="container bg-black bg-opacity-25 rounded p-3">
        @if($message = Session::get("success"))
            <div class="alert alert-success">
                {{$message}}
            </div>
        @endif
        <form action="" method="post" class="d-flex flex-column justify-content-sm-start justify-content-center">
            @csrf
            @method("POST")
            <div class="row justify-content-sm-start justify-content-center">
                <p class="text-white">De velden met een <span class="text-danger fs-4">*</span> zijn verplicht.</p>
                <div class="form-group col-lg-3 col-sm-6 col-10 text-white">
                    <label for=""><span class="text-danger fs-4">*</span> Voornaam:</label>
                    <input type="text" class="form-control" placeholder="Voornaam" name="firstName" value="@if(Session::get("user")){{Session::get("user")->firstName}}@endif">
                    <span class="text-danger">@error("firstName"){{$message}}@enderror</span>
                </div>
                <div class="form-group col-lg-3 col-sm-6 col-10 text-white">
                    <label for=""><span class="text-danger fs-4"></span> Tussenvoegsel:</label>
                    <input type="text" class="form-control"  placeholder="Tussenvoegsel" name="prefix" value="@if(Session::get("user")){{Session::get("user")->prefix}}@endif">
                </div>
                <div class="form-group col-lg-3 col-sm-6 col-10 text-white">
                    <label for=""><span class="text-danger fs-4">*</span> Achternaam:</label>
                    <input type="text" class="form-control"  placeholder="Achternaam" name="lastName" value="@if(Session::get("user")){{Session::get("user")->lastName}}@endif">
                    <span class="text-danger">@error("lastName"){{$message}}@enderror</span>
                </div>
                <div class="form-group col-lg-3 col-sm-6 col-10 text-white">
                    <label for=""><span class="text-danger fs-4">*</span> Email adres:</label>
                    <input type="text" class="form-control"  placeholder="Email adres" name="email" value="@if(Session::get("user")){{Session::get("user")->email}}@endif">
                    <span class="text-danger">@error("email"){{$message}}@enderror</span>
                </div>
                <div class="form-group col-10 text-white">
                    <label for=""><span class="text-danger fs-4">*</span> Bericht:</label>
                    <textarea cols="30" rows="10" class="form-control"  placeholder="Bericht" name="message"></textarea>
                    <span class="text-danger">@error("message"){{$message}}@enderror</span>
                </div>
            </div>
            <br>
            <input type="submit" class="btn btn-primary col-sm-3 col-10" value="Verzenden">
        </form>
    </div>
</x-user-layout>
