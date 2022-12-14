<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\userController;
use App\Http\Controllers\adminController;
use App\Http\Controllers\workerController;
use App\Http\Middleware\AuthCheck;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [userController::class, "welcome"])->name("welcome");

Route::get("/login", [userController::class, "index"])->name("login")->middleware("userLoggedIn");
Route::post("/login", [userController::class, "login"]);
Route::get("/register", [userController::class, "registerView"])->name("registerView")->middleware("userLoggedIn");
Route::post("/register", [userController::class, "register"]);
Route::get("/logout", [userController::class, "logout"])->name("logout");
Route::get("/contact", [userController::class, "contact"])->name("contact");
Route::post("/contact", [userController::class, "postContact"]);
Route::get("muziek-kopen", [userController::class, "buyMusic"])->name("buyMusic");
Route::post("muziek-kopen", [userController::class, "sendMusicRequest"]);
Route::get("orders", [userController::class, "getAllOrders"])->name("getAllOrders");
Route::get("orders/{orderId}", [userController::class, "getSingleOrder"])->name("getSingleOrder");
Route::get("orders/{songId}/kopen/{orderId}", [userController::class, "buyLicense"])->name("buyLicense");

Route::prefix("/admin")->name("admin.")->middleware("isLoggedIn")->group(function(){
    Route::get("dashboard", [adminController::class, "index"])->name("dashboard");
    Route::get("klanten", [adminController::class, "getUsers"])->name("users");
    Route::get("klanten/{userId}", [adminController::class, "getSingleUser"])->name("singleUser");
    Route::post("klanten/{userId}", [adminController::class, "editSingleUser"]);
    Route::get("delete-klant/{userId}", [adminController::class, "deleteUser"])->name("deleteUser");
    Route::get("werknemers", [adminController::class, "getWorkers"])->name("workers");
    Route::get("werknemers/{userId}", [adminController::class, "getSingleWorker"])->name("singleWorker");
    Route::post("werknemers/{userId}", [adminController::class, "editSingleWorker"]);
    Route::get("contact-berichten", [adminController::class, "getContactMessages"])->name("getContactMessages");
    Route::get("contact-berichten/{contactId}", [adminController::class, "getSingleContactMessage"])->name("getSingleContactMessage");
    Route::post("contact-berichten/{contactId}", [adminController::class, "deleteContactMessage"]);
    Route::get("medewerker-toevoegen", [adminController::class, "addWorkerView"])->name("addWorker");
    Route::post("medewerker-toevoegen", [adminController::class, "addWorker"]);
    Route::get("delete-medewerker/{workerId}", [adminController::class, "deleteWorker"])->name("deleteWorker");
    Route::get("notificaties", [adminController::class, "getNotifications"])->name("getNotifications");
    Route::get("notificaties/{notificationId}", [adminController::class, "getSingleNotification"])->name("getSingleNotification");
    Route::post("notificaties/{notificationId}", [adminController::class, "deleteNotification"]);
    Route::get("nummer-verzoeken", [adminController::class, "getSongRequests"])->name("getSongRequests");
    Route::get("nummer-verzoeken/{requestId}", [adminController::class, "getSingleSongRequest"])->name("getSingleSongRequest");
    Route::post("nummer-verzoeken/{requestId}", [adminController::class, "addOrderToWorker"]);
    Route::get("nummers", [adminController::class, "getAllSongs"])->name("getAllSongs");
    Route::get("nummers/{songId}", [adminController::class, "getSingleSong"])->name("getSingleSong");
    Route::get("nummers/{songId}/delete", [adminController::class, "deleteSong"])->name("deleteSong");
});

Route::prefix("/medewerker")->name("worker.")->middleware("workerLoggedIn")->group(function(){
    Route::get("dashboard", [workerController::class, "index"])->name("dashboard");
    Route::get("opdrachten", [workerController::class, "getOrders"])->name("getOrders");
    Route::get("opdrachten/{orderId}", [workerController::class, "getSingleOrder"])->name("getSingleOrder");
    Route::post("opdrachten/{orderId}", [workerController::class, "uploadFile"]);
});
