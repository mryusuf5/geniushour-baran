<x-user-layout>
    <img src="{{asset("user/images/background3.jpg")}}" class="backgroundImage" alt="">
    <div class="container-lg bg-black bg-opacity-25 rounded p-3">
        @if($message = Session::get("success"))
            <div class="alert alert-success">
                {{$message}}
            </div>
        @endif
            @if($errors->any())
                <div class="alert alert-danger">
                    <h3>U bent een of meerdere velden vergeten.</h3>
                    <ul>
                        @foreach($errors->all() as $error)
                            <li>{{$error}}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
        <button type="button" class="btn btn-primary mb-2" data-bs-toggle="modal" data-bs-target="#exampleModal">
            Nummer verzoeken
        </button>
        <div class="row justify-content-center">
            <div class="col-12 bg-white p-3 rounded table-responsive">
                <div class="d-flex justify-content-between mb-3">
                    <h3>Alle nummers</h3>
                </div>
                <table class="table" style="min-width: 600px">
                    <thead>
                    <tr>
                        <th></th>
                        <th>Titel</th>
                        <th>Lengthe</th>
                        <th>Bpm</th>
                        <th></th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($songs as $song)
                        <tr class="">
                            <td class="fs-2 align-middle">
                                <i class="fa-solid fa-play play song-{{$song->id}}" data-id="{{$song->id}}" data-name="{{$song->actualName}}" data-song="{{$song->fileName}}" data-creator="{{$song->firstName . " " . $song->prefix . " " . $song->lastName}}" onclick="loadTrack(this)"></i>
                            </td>
                            <td class="align-middle">
                                <h5>{{Str::limit($song->actualName, 75)}}</h5>
                                <p>door: {{$song->firstName . " " . $song->prefix . " " . $song->lastName}}</p>
                            </td>
                            <td class="align-middle">
                                <p class="">3:04</p>
                            </td>
                            <td class="align-middle">
                                <p>90</p>
                            </td>
                            <td class="align-middle">
                                <div class="d-flex gap-2 fs-4">
                                    <i data-bs-toggle="tooltip" data-bs-placement="top" title="favoriet" class="fa-regular fa-heart"></i>
                                    <i class="fa-solid fa-link" data-bs-toggle="tooltip" data-bs-placement="top" title="Kopie??r link"></i>
                                </div>
                            </td>
                            <td class="align-middle">
                                <div class="dropdown">
                                    <a href="" data-bs-toggle="dropdown"><i class="fa-solid fa-ellipsis-vertical"></i></a>
                                    <ul class="dropdown-menu">
                                        <li class="dropdown-item">
                                            <a href="" class="">Licentie kopen</a>
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
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Nummer verzoek</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="" method="post" class="d-flex flex-column justify-content-sm-start justify-content-center">
                        @csrf
                        @method("POST")
                        <div class="row justify-content-sm-start justify-content-center">
                            <p class="text-black">De velden met een <span class="text-danger fs-4">*</span> zijn verplicht.</p>
                            <div class="form-group col-lg-3 col-sm-6 col-10 text-black">
                                <label for=""><span class="text-danger fs-4">*</span> Voornaam:</label>
                                <input type="text" class="form-control" placeholder="Voornaam" name="firstName" value="@if(Session::get("user")){{Session::get("user")->firstName}}@endif">
                                <span class="text-danger">@error("firstName"){{$message}}@enderror</span>
                            </div>
                            <div class="form-group col-lg-3 col-sm-6 col-10 text-black">
                                <label for=""><span class="text-danger fs-4"></span> Tussenvoegsel:</label>
                                <input type="text" class="form-control"  placeholder="Tussenvoegsel" name="prefix" value="@if(Session::get("user")){{Session::get("user")->prefix}}@endif">
                            </div>
                            <div class="form-group col-lg-3 col-sm-6 col-10 text-black">
                                <label for=""><span class="text-danger fs-4">*</span> Achternaam:</label>
                                <input type="text" class="form-control"  placeholder="Achternaam" name="lastName" value="@if(Session::get("user")){{Session::get("user")->lastName}}@endif">
                                <span class="text-danger">@error("lastName"){{$message}}@enderror</span>
                            </div>
                            <div class="form-group col-lg-3 col-sm-6 col-10 text-black">
                                <label for=""><span class="text-danger fs-4">*</span> Email adres:</label>
                                <input type="text" class="form-control"  placeholder="Email adres" name="email" value="@if(Session::get("user")){{Session::get("user")->email}}@endif">
                                <span class="text-danger">@error("email"){{$message}}@enderror</span>
                            </div>
                            <div class="form-group col-lg-3 col-sm-6 col-10 text-black">
                                <label for=""><span class="text-danger fs-4">*</span> Titel:</label>
                                <input type="text" class="form-control"  placeholder="Titel" name="title">
                                <span class="text-danger">@error("title"){{$message}}@enderror</span>
                            </div>
                            <div class="form-group col-10 text-black">
                                <label for=""><span class="text-danger fs-4">*</span> Specifier hier hoe u uw nummer wilt hebben:</label>
                                <textarea cols="30" rows="10" class="form-control"  placeholder="Bericht" name="message"></textarea>
                                <span class="text-danger">@error("message"){{$message}}@enderror</span>
                            </div>
                        </div>
                        <br>
                        <input type="submit" class="btn btn-primary col-sm-3 col-10" value="Verstuur verzoek">
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="mp3player text-white p-3 bg-danger w-100 d-flex align-items-center gap-3 fs-2" id="mp3Player">
        <i class="fa-solid fa-pause" id="playPauseButton" onclick="playPauseTrack()"></i>
        <div class="d-flex flex-column w-100">
            <div class="d-flex justify-content-between fs-5">
                <span id="currentDuration">00:00</span>
                <div class="d-sm-block d-none">
                    <span id="songName"></span>
                    <span id="songCreator"></span>
                </div>
                <span id="songLength">00:00</span>
            </div>
            <input type="range" disabled min="1" max="100" value="0" id="songSlider" class="form-range w-100 musicPlayerRange" onchange="seekTo()">
        </div>
        <div class="btn-group dropup">
            <button type="button" class="btn btn-danger" data-bs-toggle="dropdown" aria-expanded="false">
                <i class="fa-solid fa-ellipsis-vertical"></i>
            </button>
            <ul class="dropdown-menu">
                <li>
                    <a href="" class="dropdown-item">Licentie kopen</a>
                    <div class="dropdown-item d-flex flex-column">
                        <span>Volume</span>
                        <input type="range" id="volumeSlider" class="form-range" max="100" value="50" onchange="setVolume()">
                    </div>
                    <div class="dropdown-item d-sm-none d-block">
                        <span id="songTitleResponsive"></span>
                        <span id="songCreatorResponsive"></span>
                    </div>
                </li>
            </ul>
        </div>
    </div>
    <audio controls id="actualMp3">
        <source src="{{asset("user/songs/song1.mp3")}}" type="audio/mpeg">
    </audio>
</x-user-layout>
