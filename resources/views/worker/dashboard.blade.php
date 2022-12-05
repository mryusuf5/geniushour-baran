<x-worker-layout>
    <h2>Welkom {{Session::get("user")->firstName . " " . Session::get("user")->prefix . " " . Session::get("user")->lastName}}</h2>
</x-worker-layout>
