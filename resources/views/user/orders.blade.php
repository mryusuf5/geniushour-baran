<x-user-layout>
    <img src="{{asset("user/images/background4.jpg")}}" class="backgroundImage" alt="">
    <div class="d-flex justify-content-center">
        <div class="d-flex flex-column col-6">
            @if($message = Session::get("success"))
                <div class="alert alert-success">
                    {{$message}}
                </div>
            @endif
            <div class="container bg-black bg-opacity-25 rounded p-3 row gap-2 justify-content-center">
                @foreach($orders as $order)
                    <a href="{{route("getSingleOrder", $order->id)}}" class="card col-lg-3 col-10" style="text-decoration: none">
                        <div class="card-body">
                            <h3>{{$order->title}}</h3>
                            <p>{{Str::limit($order->message, 50)}}</p>
                        </div>
                    </a>
                @endforeach
                @if(count($orders) == 0)
                    <div class="alert alert-danger">
                        <h3>U heeft nog geen order geplaatst.</h3>
                    </div>
                @endif
            </div>
        </div>
    </div>
</x-user-layout>
