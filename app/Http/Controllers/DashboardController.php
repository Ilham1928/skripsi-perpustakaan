<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Book;
use App\Models\UserBorrow;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $data = $this->data();
        return view('page.dashboard.index')
            ->with([
                'data' => $data,
                'title' => "Perpustakaan Online"
            ]);
    }

    protected function data()
    {
        return (object) [
            'total_student' => User::count(),
            'total_book' => Book::count(),
            'total_transaction' => UserBorrow::count()
        ];
    }
}
