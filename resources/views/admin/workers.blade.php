<x-admin-layout>
    <h3>Medewerkers</h3>
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
                    <th>Account gemaakt op</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach($users as $user)
                    <tr>
                        <td>{{$user->firstName}}</td>
                        <td>{{$user->prefix}}</td>
                        <td>{{$user->lastName}}</td>
                        <td>{{$user->email}}</td>
                        <td>{{$user->created_at}}</td>
                        <td>
                            <a href="{{route("admin.singleWorker", $user->id)}}" class="btn btn-primary">Aanpassen</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <a href="{{route("admin.addWorker")}}" class="btn btn-primary">Medewerker toevoegen</a>
    </div>
</x-admin-layout>
