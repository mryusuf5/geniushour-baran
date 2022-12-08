<x-user-layout>
    <img src="{{asset("user/images/background4.jpg")}}" class="backgroundImage" alt="">
    <div class="d-flex justify-content-center">
        <div class="container bg-black bg-opacity-25 rounded p-3 row gap-2 justify-content-center flex-column">
            <div class="col-lg-3 col-10 text-white" style="text-decoration: none">
                <div class="card-body">
                    <h3>{{$order->title}}</h3>
                    <p>{{Str::limit($order->message, 50)}}</p>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-12 bg-white p-3 rounded table-responsive">
                    <div class="d-flex justify-content-between mb-3">
                        <h3>Op uw order aangemaakte nummers</h3>
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
                                    <i class="fa-solid fa-play play song-{{$song->id}}" data-id="{{$song->id}}" data-name="{{$song->actualName}}" data-song="{{$song->fileName}}" data-creator="{{$order->firstName . " " . $order->prefix . " " . $order->lastName}}" onclick="loadTrack(this)"></i>
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
                                        <i class="fa-solid fa-link" data-bs-toggle="tooltip" data-bs-placement="top" title="Kopieër link"></i>
                                    </div>
                                </td>
                                <td class="align-middle">
                                    <div class="dropdown">
                                        <a href="" data-bs-toggle="dropdown"><i class="fa-solid fa-ellipsis-vertical"></i></a>
                                        <ul class="dropdown-menu">
                                            <li class="dropdown-item">
                                                <a href="" class="">Licentie kopen</a>
                                            </li>
                                            <li class="dropdown-item">
                                                <a href="">Revisie aanvragen</a>
                                            </li>
                                        </ul>
                                    </div>

                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
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
