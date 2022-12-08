<x-admin-layout>
    <form action="" method="post" class="d-flex flex-column justify-content-center align-items-sm-start align-items-center">
        @csrf
        @method("POST")
        <div class="row justify-content-sm-start justify-content-center">
            <div class="form-group col-lg-4 col-sm-6 col-10">
                <label for="">Medewerker:</label>
                <input type="text" disabled class="form-control" value="{{$song->firstName . " " . $song->prefix . " " . $song->lastName}}">
            </div>
            <div class="form-group col-sm-12 col-10">
                <label for="">Lied naam:</label>
                <textarea cols="30" rows="10" class="form-control" disabled>
                    {{$song->actualName}}
                </textarea>
            </div>
            <div class="form-group col-lg-4 col-sm-6 col-10">
                <label for="">Gemaakt op:</label>
                <input type="text" class="form-control" disabled value="{{$song->created_at}}">
            </div>
        </div>
        <div class="d-flex flex-sm-row flex-column col-sm-3 col-10">
            <a href="{{route("admin.deleteSong", $song->id)}}" class="btn btn-danger">Verwijderen</a>
        </div>
    </form>
</x-admin-layout>
