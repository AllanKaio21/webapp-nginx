<?php

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get("/", [Controller::class, "index"])->name('site.show');

Route::get("/duck", [Controller::class, "duck"])->name('site.duck');

Route::get("/contact", [Controller::class, "contact"])->name('site.contact');

Route::get("/about", [Controller::class, "about"])->name('site.about');