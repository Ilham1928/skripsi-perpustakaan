<?php

namespace App\Http\Controllers;

use App\Models\Book;

class HomeController extends Controller
{

    public function index()
    {
        return view('home.index')
            ->with(['title' => "Perpustakaan Online"]);
    }

}
