<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\userController;
use App\Http\Controllers\adminController;
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

Route::prefix("/admin")->name("admin.")->middleware("isLoggedIn")->group(function(){
    Route::get("dashboard", [adminController::class, "index"])->name("dashboard");
    Route::get("klanten", [adminController::class, "getUsers"])->name("users");
    Route::get("klanten/{userId}", [adminController::class, "getSingleUser"])->name("singleUser");
    Route::post("klanten/{userId}", [adminController::class, "editSingleUser"]);
    Route::get("werknemers", [adminController::class, "getWorkers"])->name("workers");
    Route::get("werknemers/{userId}", [adminController::class, "getSingleWorker"])->name("singleWorker");
    Route::post("werknemers/{userId}", [adminController::class, "editSingleWorker"]);
    Route::get("contact-berichten", [adminController::class, "getContactMessages"])->name("getContactMessages");
    Route::get("contact-berichten/{contactId}", [adminController::class, "getSingleContactMessage"])->name("getSingleContactMessage");
    Route::post("contact-berichten/{contactId}", [adminController::class, "deleteContactMessage"]);
});
