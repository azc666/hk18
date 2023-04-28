<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class AuthLocationController extends Controller
{
    public function index()
    {
        $authorized = true;
        Session::put('authorized', $authorized);

        return view('categories');
    }
}