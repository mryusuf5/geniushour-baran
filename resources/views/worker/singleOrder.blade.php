<x-worker-layout>
    <div class="d-flex flex-column">
        @if($message = Session::get("success"))
            <div class="alert alert-success">
                <h3>{{$message}}</h3>
            </div>
        @endif
        <div class="d-flex gap-2 flex-sm-row flex-column">
            <p class="fw-bold">Klant naam:</p>
            <p>{{$order->firstName . " " . $order->prefix . " " . $order->lastName}}</p>
        </div>
            <div class="d-flex gap-2 flex-sm-row flex-column">
                <p class="fw-bold">Titel:</p>
                <p>{{$order->title}}</p>
            </div>
        <div class="d-flex gap-2 flex-sm-row flex-column">
            <p class="fw-bold">Bericht:</p>
            <p>
                <span id="moreText">{{Str::limit($order->message, 100)}}</span>
                @if(Str::length($order->message) > 100)
                    <span class="collapse" id="fullText">{{$order->message}}</span>
                    <a href="#fullText" data-bs-toggle="collapse" id="readMore">Meer lezen</a>
                @endif
            </p>
        </div>
        <div class="d-flex flex-column gap-2">
            <form action="" method="post" enctype="multipart/form-data">
                @csrf
                @method("POST")
                <label for="" class="form-label">Upload bestand:</label>
                <input name="file" type="file" value="Upload bestand" class="form-control col-lg-3 col-10" onchange="form.submit()">
            </form>

            <p>Mijn geuploade bestanden:</p>
            <div class="row gap-2 justify-content-lg-start justify-content-center">
                @foreach($files as $file)
                    <a href="{{asset("files/" . $file->fileName)}}" download class="card col-xl-3 col-lg-5 col-10 fileCard">
                        <div class="card-body">
                            <div class="d-flex flex-column text-center">
                                <h1 style="font-size: 10rem" class="documentIcon">
                                    <i class="fa-solid fa-file"></i>
                                </h1>
                                <span>{{$file->actualName}}</span>
                            </div>
                        </div>
                    </a>
                @endforeach
            </div>
        </div>
    </div>
</x-worker-layout>
