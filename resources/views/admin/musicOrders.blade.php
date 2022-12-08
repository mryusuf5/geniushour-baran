<x-admin-layout>
    <h3>Muziek orders</h3>
    @if($message = Session::get("success"))
        <div class="alert alert-success">
            <h3>{{$message}}</h3>
        </div>
    @endif
    <div class="table-responsive">
        <table class="table" style="min-width: 900px">
            <thead>
            <tr>
                <th>Voornaam</th>
                <th>Tussenvoegsel</th>
                <th>Achternaam</th>
                <th>Email</th>
                <th>Titel</th>
                <th>Bericht</th>
                <th></th>
            </tr>
            </thead>
            <tbody>
            @foreach($requests as $request)
                <tr>
                    <td>{{$request->firstName}}</td>
                    <td>{{$request->prefix}}</td>
                    <td>{{$request->lastName}}</td>
                    <td>{{$request->email}}</td>
                    <td>{{Str::limit($request->title, 25)}}</td>
                    <td>{{Str::limit($request->message, 50)}}</td>
                    <td>
                        <div class="btn-group dropdown">
                            <a href="#" data-bs-toggle="dropdown">
                                <i class="fa-solid fa-ellipsis-vertical"></i>
                            </a>
                            <ul class="dropdown-menu">
                                <li>
                                    <div class="dropdown-item">
                                        <a href="{{route("admin.getSingleSongRequest", $request->id)}}" class="">Bekijken</a>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        {{$requests->links()}}
    </div>
</x-admin-layout>
