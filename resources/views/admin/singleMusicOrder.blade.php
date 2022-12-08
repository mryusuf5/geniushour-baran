<x-admin-layout>
    <div class="container">
        @if($message = Session::get("success"))
            <div class="alert alert-success">
                <h3>{{$message}}</h3>
            </div>
        @endif
        <form action="" method="post">
            @csrf
            @method("POST")
            <div class="form-group">
                <label for="">Naam:</label>
                <input type="text" disabled value="{{$request->firstName . " " . $request->prefix . " " . $request->lastName}}" class="form-control">
            </div>
            <div class="form-group">
                <label for="">Email:</label>
                <input type="text" disabled value="{{$request->email}}" class="form-control">
            </div>
            <div class="form-group">
                <label for="">Titel:</label>
                <input type="text" disabled value="{{$request->title}}" class="form-control">
            </div>
            <div class="form-group">
                <label for="">Bericht:</label>
                <textarea cols="30" rows="10" class="form-control" disabled>
                    {{$request->message}}
                </textarea>
            </div>
            <div class="d-flex justify-content-end">
                <a href="mailto:{{$request->email}}" target="email" class="btn btn-primary mr-2">Email sturen</a>
                <input type="submit" class="btn btn-danger" value="Bericht verwijderen">
            </div>
        </form>
        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#bindModal">Koppel aan een of meerdere medewerkers</button>
    </div>
    <div class="modal fade" id="bindModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Koppellen aan medewerkers</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="" method="post">
                    @csrf
                    @method("POST")
                    <div class="modal-body">
                        @foreach($workers as $worker)
                            <div class="d-flex justify-content-between form-check form-switch">
                                <input type="checkbox"
                                       @foreach($connectedOrder as $order)
                                           @if($worker->id == $order->workerId)
                                               checked
                                           @endif
                                       @endforeach
                                       class="form-check-input" style="position: absolute; right: 0" name="worker[{{$worker->id}}]">
                                <label class="form-check-label">{{$worker->firstName . " " . $worker->prefix . " " . $worker->lastName}}</label>
                            </div>
                            <hr>
                        @endforeach
                    </div>
                    <div class="modal-footer">
                        <input type="submit" class="btn btn-primary" value="Opslaan"/>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-admin-layout>
