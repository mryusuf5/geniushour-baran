<?php

namespace App\Http\Controllers;

use App\Models\ConnectOrderWorker;
use App\Models\OrderFiles;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class workerController extends Controller
{
    public function index()
    {
        return view("worker.dashboard");
    }

    public function getOrders()
    {
        $orders = DB::table("connectorderworker")
            ->where("workerId", Session::get("user")->id)
            ->join("musicorders", "musicorders.id", "=", "connectorderworker.orderId")->orderBy("connectorderworker.created_at", "DESC")->get();

        return view("worker.orders", compact("orders"));
    }

    public function getSingleOrder($id)
    {
        $order = DB::table("connectorderworker")
            ->where("workerId", Session::get("user")->id)
            ->where("connectorderworker.orderId", $id)
            ->join("musicorders", "musicorders.id", "=", "connectorderworker.orderId")->first();

        $files = OrderFiles::where("workerId", Session::get("user")->id)->where("orderId", $id)->get();

        return view("worker.singleOrder", compact("order", "files"));
    }

    public function uploadFile(Request $request, $id)
    {
        $file = $request->file("file");
        $extension = $request->file("file")->getClientOriginalExtension();
        $fileName = time() . "." . $extension;
        $file->move("files/", $fileName);

        $orderFile = new OrderFiles;

        $orderFile->workerId = Session::get("user")->id;
        $orderFile->orderId = $id;
        $orderFile->fileName = $fileName;
        $orderFile->actualName = $request->file("file")->getClientOriginalName();
        $orderFile->save();

        return redirect()->route("worker.getSingleOrder", $id)->with("success", "File geupload.");
    }
}
