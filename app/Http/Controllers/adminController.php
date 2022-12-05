<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;
use App\Models\User;

class adminController extends Controller
{
    public function index()
    {
        return view("admin.dashboard");
    }

    public function getUsers()
    {
        $users = User::where("permissionLevel", "0")->get();

        return view("admin.users", compact("users"));
    }

    public function getSingleUser($id)
    {
        $user = User::where("id", $id)->firstOrFail();
        return view("admin.singleWorker", compact("user"));
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

    public function getWorkers()
    {
        $users = User::where("permissionLevel", "1")->get();

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

    public function getContactMessages()
    {
        $contacts = Contact::orderBy("created_at", "DESC")->get();
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
}