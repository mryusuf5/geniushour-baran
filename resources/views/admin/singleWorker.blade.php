<x-admin-layout>
    <form action="" method="post" class="d-flex flex-column justify-content-center align-items-sm-start align-items-center">
        @csrf
        @method("POST")
        <div class="row justify-content-sm-start justify-content-center">
            <div class="form-group col-lg-4 col-sm-6 col-10">
                <label for="">Voornaam</label>
                <input type="text" name="firstName" class="form-control" value="{{$user->firstName}}">
                <span class="text-danger">@error("firstName"){{$message}}@enderror</span>
            </div>
            <div class="form-group col-lg-4 col-sm-6 col-10">
                <label for="">Tussenvoegsel</label>
                <input type="text" name="prefix" class="form-control" value="{{$user->prefix}}">
            </div>
            <div class="form-group col-lg-4 col-sm-6 col-10">
                <label for="">Achternaam</label>
                <input type="text" name="lastName" class="form-control" value="{{$user->lastName}}">
                <span class="text-danger">@error("lastName"){{$message}}@enderror</span>
            </div>
            <div class="form-group col-lg-4 col-sm-6 col-10">
                <label for="">Email</label>
                <input type="text" name="email" class="form-control" value="{{$user->email}}">
                <span class="text-danger">@error("email"){{$message}}@enderror</span>
            </div>
        </div>
        <input type="submit" value="Aanpassen" class="btn btn-primary col-sm-3 col-10">
    </form>
</x-admin-layout>
