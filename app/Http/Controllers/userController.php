<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\MusicOrders;
use App\Models\Notifications;
use App\Models\OrderFiles;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;

class userController extends Controller
{
    public function index()
    {
        return view("user.login");
    }

    public function welcome()
    {
        return view("user.welcome");
    }

    public function registerView()
    {
        return view("user.register");
    }

    public function register(Request $request)
    {
        $request->validate([
            "firstName" => "required",
            "lastName" => "required",
            "email" => "required|email|unique:users",
            "password" => "required|min:8",
            "repeatPassword" => "required",
        ]);

        $user = new User();
        $user->firstName = $request->firstName;
        $user->prefix = $request->prefix;
        $user->lastName = $request->lastName;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);

        $user->save();

        return redirect()->route("login")->with("success", "Je bent aangemeld, je kan nu inloggen!");
    }

    public function login(Request $request)
    {
        $request->validate([
            "email" => "required",
            "password" => "required"
        ]);

        $user = User::where("email", "=", $request->email)->first();
        if($user)
        {
         if(Hash::check($request->password, $user->password))
         {
            $request->session()->put("user", $user);
            return redirect()->route("welcome");
         }
         else
         {
            return redirect()->route("login")->with("fail", "Wachtwoord is onjuist");
         }
        }
        else
        {
            return redirect()->route("login")->with("fail", "Email adres is onjuist");
        }
    }

    public function logout()
    {
        if(Session::has("user"))
        {
            Session::pull("user");
            return redirect()->route("login");
        }
        return abort(404);
    }

    public function contact()
    {
        return view("user.contact");
    }

    public function postContact(Request $request)
    {
        $request->validate([
            "firstName" => "required",
            "lastName" => "required",
            "email" => "required",
            "message" => "required"
        ]);
        Contact::create($request->all());

        return redirect()->route("contact")->with("success", "Bericht verzonden, we zullen zo snel mogelijk contact met u opnemen.");
    }

    public function buyMusic()
    {
        return view("user.buyMusic");
    }

    public function sendMusicRequest(Request $request)
    {
        $request->validate([
            "firstName" => "required",
            "lastName" => "required",
            "email" => "required",
            "message" => "required",
            "title" => "required"
        ]);

        $order = new MusicOrders;

        $order->firstName = $request->firstName;
        $order->prefix = $request->prefix;
        $order->lastName = $request->lastName;
        $order->email = $request->email;
        $order->message = $request->message;
        $order->title = $request->title;
        $order->userId = Session::get("user")->id;

        $order->save();
        $notification = new Notifications;

        $notification->firstName = $request->firstName;
        $notification->prefix = $request->prefix;
        $notification->lastName = $request->lastName;
        $notification->email = $request->email;
        $notification->message = "Er is een nieuwe order geplaatst";
        $notification->level = 1;
        $notification->save();

        return redirect()->route("buyMusic")->with("success", "Verzoek verzonden, we mailen u zo snel mogelijk.");
    }

    public function getAllOrders()
    {
        $orders = MusicOrders::where("userId", Session::get("user")->id)->get();

        return view("user.orders", compact("orders"));
    }

    public function getSingleOrder($id)
    {
        $order = MusicOrders::where("id", $id)->firstOrFail();
//        $songs = OrderFiles::where("orderId", $id)->get();

        $songs = DB::table("orderfiles")
            ->where("orderId", $id)
            ->join("users", "users.id", "=", "orderfiles.workerId")->get();

        return view("user.singleOrder", compact("order", "songs"));
    }
}
