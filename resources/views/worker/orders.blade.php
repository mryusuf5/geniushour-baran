<x-worker-layout>
    <div class="row justify-content-xl-start justify-content-center gap-2">
        @foreach($orders as $order)
            <div class="card col-xl-3 col-8 orderCard">
                <div class="card-body">
                    <h6 class="text-muted">{{$order->created_at}}</h6>
                    <H5 class="card-title">{{$order->firstName . " " . $order->prefix . " " . $order->lastName}}</H5>
                    <h6 class="text-truncate">{{$order->title}}</h6>
                    <p class="card-text text-truncate">{{$order->message}}</p>
                    <a href="{{route("worker.getSingleOrder", $order->id)}}" class="card-link">Opdracht openen</a>
                </div>
            </div>
        @endforeach
    </div>
</x-worker-layout>
