<x-admin-layout>
    <h3>Contact berichten</h3>
    @if($message = Session::get("success"))
        <div class="alert alert-success">
            <h3>{{$message}}</h3>
        </div>
    @endif
    <div class="table-responsive">
        <table class="table table-striped" style="min-width: 900px">
            <thead>
            <tr>
                <th>Voornaam</th>
                <th>Tussenvoegsel</th>
                <th>Achternaam</th>
                <th>Email</th>
                <th>Bericht</th>
                <th>Type</th>
                <th></th>
            </tr>
            </thead>
            <tbody>
            @foreach($notifications as $notification)
                <tr>
                    <td>{{$notification->firstName}}</td>
                    <td>{{$notification->prefix}}</td>
                    <td>{{$notification->lastName}}</td>
                    <td>{{$notification->email}}</td>
                    <td>{{Str::limit($notification->message, 50)}}</td>
                    <td>
                        @if($notification->level == 1)
                            Aanvraag nummer
                        @endif
                    </td>
                    <td><a href="{{route("admin.getSingleNotification", $notification->id)}}" class="btn btn-primary">Bekijken</a></td>
                </tr>
            @endforeach
            </tbody>
        </table>
        {{$notifications->links()}}
    </div>
</x-admin-layout>
