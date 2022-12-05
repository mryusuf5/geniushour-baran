<x-admin-layout>
    <div class="container">
        <form action="" method="post">
            @csrf
            @method("POST")
            <div class="form-group">
                <label for="">Naam:</label>
                <input type="text" disabled value="{{$notification->firstName . " " . $notification->prefix . " " . $notification->lastName}}" class="form-control">
            </div>
            <div class="form-group">
                <label for="">Email:</label>
                <input type="text" disabled value="{{$notification->email}}" class="form-control">
            </div>
            <div class="form-group">
                <label for="">Bericht:</label>
                <textarea cols="30" rows="10" class="form-control" disabled>
                    {{$notification->message}}
                </textarea>
            </div>
            <div class="d-flex justify-content-end">
                <a href="mailto:{{$notification->email}}" target="email" class="btn btn-primary mr-2">Email sturen</a>
                <input type="submit" class="btn btn-danger" value="Bericht verwijderen">
            </div>
        </form>
    </div>
</x-admin-layout>
