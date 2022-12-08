<x-admin-layout>
    <h3>Contact berichten</h3>
    @if($message = Session::get("success"))
        <div class="alert alert-success">
            <h3>{{$message}}</h3>
        </div>
    @endif
    <div class="table-responsive">
        <table class="table" style="min-width: 900px">
            <thead>
            <tr>
                <th>Medewerker</th>
                <th>Lied naam</th>
                <th>gemaakt op</th>
                <th></th>
            </tr>
            </thead>
            <tbody>
            @foreach($songs as $song)
                <tr>
                    <td>{{$song->firstName . " " . $song->prefix . " " . $song->lastName}}</td>
                    <td>{{$song->actualName}}</td>
                    <td>{{$song->created_at}}</td>
                    <td>
                        <div class="btn-group dropdown">
                            <a href="#" data-bs-toggle="dropdown">
                                <i class="fa-solid fa-ellipsis-vertical"></i>
                            </a>
                            <ul class="dropdown-menu">
                                <li>
                                    <div class="dropdown-item">
                                        <a href="{{route("admin.getSingleSong", $song->id)}}" class="">Bekijken</a>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        {{$songs->links()}}
    </div>
</x-admin-layout>
