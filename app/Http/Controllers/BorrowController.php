<?php

namespace App\Http\Controllers;

use App\Models\UserBorrow;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class BorrowController extends Controller
{
    public function index()
    {
        $data = UserBorrow::select(
                'borrow.*',
                'book.*',
                'user.name as student_name',
                'user.class'
            )
            ->join('book', 'book.book_id', '=', 'borrow.book_id')
            ->join('user', 'user.user_id', '=', 'borrow.user_id')
            ->get();

        return view('page.borrow.index')
            ->with([
                'title' => "Data Peminjaman",
                'data' => $data,
            ]);
    }

    public function update(Request $request)
    {
        UserBorrow::where('borrow_id', $request->borrow_id)
            ->update(['return_date' => $request->return_date]);

        return response()->json(['code' => 200]);
    }

    public function delete($id)
    {
        UserBorrow::where('borrow_id', $id)->delete();

        return redirect('admin/borrow')
            ->with('success', 'Berhasil Menghapus Peminjaman');
    }
}
