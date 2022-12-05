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
                    <tr class="">
                        <td class="fs-2 align-middle"><i class="fa-solid fa-play play" id="1" onclick="loadTrack(this.id)"></i></td>
                        <td class="align-middle">
                            <h5>Last Christmas</h5>
                            <p>door: Wham!</p>
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
                            <a href="" class="btn btn-secondary rounded-pill" style="min-width: 128px">Licentie kopen</a>
                        </td>
                    </tr>
                    <tr class="">
                        <td class="fs-2 align-middle"><i class="fa-solid fa-play play" id="2" onclick="loadTrack(this.id)"></i></td>
                        <td class="align-middle">
                            <h5>Last Christmas</h5>
                            <p>door: Wham!</p>
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
                            <a href="" class="btn btn-secondary rounded-pill" style="min-width: 128px">Licentie kopen</a>
                        </td>
                    </tr>
                    </tbody>
                </table>
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
</x-user-layout>
