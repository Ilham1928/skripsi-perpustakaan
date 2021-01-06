<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class BookController extends Controller
{
    public function index()
    {
        $data = Book::get();
        $category = Category::get();

        return view('page.book.index')
            ->with([
                'title' => "Data Buku",
                'data' => $data,
                'category' => $category
            ]);
    }

    public function add()
    {

        return view('page.book.add')
            ->with([
                'title' => "Tambah Data Buku",
            ]);
    }

    public function create(Request $request)
    {
        dd($request->all());
    }

    public function edit($id)
    {
        $data = Book::where('book_id', $id)->first();

        return view('page.book.edit')
            ->with([
                'title' => "Ubah Data Buku",
                'data' => $data
            ]);
    }

    public function update(Request $request, $id)
    {
        return new AdminUpdateResponse($id);

    }

    public function delete($id)
    {
        return new AdminDeleteResponse($id);
    }
}
