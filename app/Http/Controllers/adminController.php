<?php

namespace App\Http\Controllers;

use App\Models\BuyableOrders;
use App\Models\ConnectOrderWorker;
use App\Models\Contact;
use App\Models\MusicOrders;
use App\Models\Notifications;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class adminController extends Controller
{
    public function index()
    {
        return view("admin.dashboard");
    }

    public function getUsers()
    {
        $users = User::where("permissionLevel", "0")->latest()->paginate(10);

        return view("admin.users", compact("users"));
    }

    public function getSingleUser($id)
    {
        $user = User::where("id", $id)->firstOrFail();
        return view("admin.singleUser", compact("user"));
    }

    public function editSingleUser(Request $request, $id)
    {
        $request->validate([
            "firstName" => "required",
            "lastName" => "required",
            "email" => "required"
        ]);

        $user = User::where("id", $id)->firstOrFail();

        $user->firstName = $request->firstName;
        $user->prefix = $request->prefix;
        $user->lastName = $request->lastName;
        $user->email = $request->email;

        $user->save();

        return redirect()->route("admin.users")->with("success", "Klant is aangepast");
    }

    public function deleteUser($id)
    {
        User::destroy($id);

        return redirect()->route("admin.users")->with("success", "Klant is verwijderd");
    }

    public function getWorkers()
    {
        $users = User::where("permissionLevel", "1")->latest()->paginate(10);

        return view("admin.workers", compact("users"));
    }

    public function getSingleWorker($id)
    {
        $user = User::where("id", $id)->firstOrFail();

        return view("admin.singleWorker", compact("user"));
    }

    public function editSingleWorker(Request $request, $id)
    {
        $request->validate([
            "firstName" => "required",
            "lastName" => "required",
            "email" => "required"
        ]);

        $user = User::where("id", $id)->firstOrFail();

        $user->firstName = $request->firstName;
        $user->prefix = $request->prefix;
        $user->lastName = $request->lastName;
        $user->email = $request->email;

        $user->save();

        return redirect()->route("admin.workers")->with("success", "Medewerker is aangepast.");
    }

    public function deleteWorker($id)
    {
        User::destroy($id);

        return redirect()->route("admin.workers")->with("success", "Medewerker is verwijderd.");
    }

    public function getContactMessages()
    {
        $contacts = Contact::orderBy("created_at", "DESC")->latest()->paginate(10);
        return view("admin.contactMessages", compact("contacts"));
    }

    public function getSingleContactMessage($id)
    {
        $contact = Contact::find($id);

        return view("admin.singleContactMessage", compact("contact"));
    }

    public function deleteContactMessage($id)
    {
        Contact::destroy($id);

        return redirect()->route("admin.getContactMessages")->with("success", "Bericht verwijderd.");
    }

    public function addWorkerView()
    {
        return view("admin.addWorker");
    }

    public function addWorker(Request $request)
    {
        $request->validate([
            "firstName" => "required",
            "lastName" => "required",
            "email" => "required|unique:users"
        ]);

        $user = new User;

        $user->firstName = $request->firstName;
        $user->prefix = $request->prefix;
        $user->lastName = $request->lastName;
        $user->email = $request->email;
        $user->permissionLevel = "1";
        $user->password = Hash::make("12345678");

        $user->save();

        return redirect()->route("admin.workers")->with("success", "Medewerker toegevoegd.");
    }

    public function getNotifications()
    {
        $notifications = Notifications::orderBy("created_at", "DESC")->paginate(10);

        return view("admin.notifications", compact("notifications"));
    }

    public function getSingleNotification($id)
    {
        $notification = Notifications::find($id);

        return view("admin.singleNotification", compact("notification"));
    }

    public function deleteNotification($id)
    {
        Notifications::destroy($id);

        return redirect()->route("admin.getNotifications")->with("success", "Notificatie verwijderd");
    }

    public function getSongRequests()
    {
        $requests = MusicOrders::orderBy("created_at", "DESC")->paginate(10);

        return view("admin.musicOrders", compact("requests"));
    }

    public function getSingleSongRequest($id)
    {
        $request = MusicOrders::find($id);
        $connectedOrder = DB::table("connectorderworker")
            ->where("orderId", $id)
            ->join("users", "users.id", "=", "connectorderworker.workerid")->get();
        $workers = User::where("permissionLevel", "1")->get();

        return view("admin.singleMusicOrder", compact("request", "workers", "connectedOrder"));
    }

    public function addOrderToWorker(Request $request, $id)
    {
        foreach($request->worker as $index => $worker)
        {
            $order = new ConnectOrderWorker;
            $order->workerId = $index;
            $order->orderId = $id;
            $order->save();
        }

        return redirect()->route("admin.getSingleSongRequest", $id)->with("success", "Order toegevoegd aan medewerker(s).");
    }

    public function getAllSongs()
    {
        $songs = DB::table("buyableorders")
        ->select("users.firstName", "users.prefix", "users.lastName", "buyableorders.actualName", "buyableorders.created_at", "buyableorders.id")
        ->join("users", "users.id", "=", "buyableorders.workerId")
        ->orderBy("buyableorders.created_at", "DESC")
        ->paginate(10);

        return view("admin.songs", compact("songs"));
    }

    public function getSingleSong($id)
    {
        $song = DB::table("buyableorders")
            ->select("users.firstName", "users.prefix", "users.lastName", "buyableorders.actualName", "buyableorders.created_at", "buyableorders.id")
            ->where("buyableorders.id", $id)
            ->join("users", "users.id", "=", "buyableorders.workerId")->first();

        return view("admin.singleSong", compact("song"));
    }

    public function deleteSong($id)
    {
        BuyableOrders::destroy($id);

        return redirect()->route("admin.getAllSongs")->with("success", "Nummer verwijderd.");
    }
}
