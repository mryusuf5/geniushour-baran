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
                <th></th>
            </tr>
            </thead>
            <tbody>
            @foreach($contacts as $contact)
                <tr>
                    <td>{{$contact->firstName}}</td>
                    <td>{{$contact->prefix}}</td>
                    <td>{{$contact->lastName}}</td>
                    <td>{{$contact->email}}</td>
                    <td>{{Str::limit($contact->message, 50)}}</td>
                    <td><a href="{{route("admin.getSingleContactMessage", $contact->id)}}" class="btn btn-primary">Bekijken</a></td>
                </tr>
            @endforeach
            </tbody>
        </table>
        {{$contacts->links()}}
    </div>
</x-admin-layout>
