<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        return view('page.home.index')
            ->with(['title' => "Perpustakaan Online"]);
    }

    public function search(Request $request)
    {
        $data = Book::select('*')
            ->selectRaw("
                if(cover is null or cover = '', null,
                CONCAT('".asset('storage/cover')."/',
                cover)) as cover"
            )
            ->where('name', 'like', '%'.$request->keyword.'%')
            ->orWhere('writer', 'like', '%'.$request->keyword.'%')
            ->orWhere('publisher', 'like', '%'.$request->keyword.'%')
            ->get();

        return view('page.home.search')
            ->with([
                'title' => 'Hasil Pencarian',
                'keyword' => $request->keyword,
                'data' => $data
            ]);
    }

    public function detail($id)
    {
        $data = Book::select('*')
            ->selectRaw("
                if(cover is null or cover = '', null,
                CONCAT('".asset('storage/cover')."/',
                cover)) as cover"
            )->where('book_id', $id)
            ->first();

        return response()->json([
            'code' => 200,
            'data' => $data
        ]);
    }
}
