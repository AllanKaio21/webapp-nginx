<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    public function index()
    {
        return view('site.show', ['menu' => 'home']);
    }

    public function duck()
    {
        return view('site.duck', ['menu' => 'duck']);
    }

    public function contact()
    {
        return view('site.contact', ['menu' => 'contact']);
    }

    public function about()
    {
        return view('site.about', ['menu' => 'about']);
    }
}
