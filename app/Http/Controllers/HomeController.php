<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\UserBorrow;
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

    public function borrow(Request $request)
    {
        $check = UserBorrow::where('user_id', $request->user_id)
            ->where('book_id', $request->book_id)
            ->where('return_date', '<=', date('Y-m-d'))
            ->first();

        if (!$check) {
            UserBorrow::create([
                'book_id' => $request->book_id,
                'user_id' => $request->user_id,
                'borrow_date' => date('Y-m-d'),
                'return_date' => $request->return_date
            ]);

            return redirect()->back()
                ->with('success', 'Berhasil Meminjam Buku');
        }else{
            return redirect()->back()
                ->with('failed', 'Kamu masih meminjam buku ini');
        }
    }

    public function bookBorrowed($id)
    {
        $data = UserBorrow::select('*')
            ->selectRaw("
                if(cover is null or cover = '', null,
                CONCAT('".asset('storage/cover')."/',
                cover)) as cover"
            )
            ->join('book', 'book.book_id', '=', 'borrow.book_id')
            ->where('user_id', $id)
            ->where('return_date', '<=', date('Y-m-d'))
            ->get();

        return view('page.home.borrow')
            ->with([
                'title' => 'Data Peminjaman Buku',
                'data' => $data
            ]);
    }
}
