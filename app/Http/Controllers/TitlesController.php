<?php

namespace App\Http\Controllers;

use App\Models\Title;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class TitlesController extends Controller
{
    public function index(Title $title)
    {
        // $type = $title->type;
        // Session::put('type', $type);

        return view('titles');
    }
}