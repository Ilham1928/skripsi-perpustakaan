<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class BookController extends Controller
{
    public function index()
    {
        $data = Book::select('book.*', 'category.name as category_name')
            ->join('category', 'category.category_id', '=', 'book.category_id')
            ->get();
        $category = Category::get();

        return view('page.book.index')
            ->with([
                'title' => "Data Buku",
                'data' => $data,
                'category' => $category
            ]);
    }

    public function create(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'cover' => 'required|file',
            'name' => 'required',
            'uuid' => 'unique:book|required',
            'publisher' => 'required',
            'publish_at' => 'required',
            'stock' => 'required',
            'category_id' => 'required|exists:category'
        ]);

        if ($validator->fails()) {
            return $this->invalid($validator->errors()->first(), $request);
        }

        Book::create([
            'cover' => $this->image($request->file('cover')),
            'name' => $request->name,
            'publisher' => $request->publisher,
            'publish_at' => date($request->publish_at.'-m-d'),
            'writer' => $request->writer,
            'uuid' => $request->uuid,
            'category_id' => $request->category_id,
            'stock' => $request->stock
        ]);

        return redirect('admin/book')
            ->with('success', 'Berhasil Membuat Buku');
    }

    public function edit($id)
    {
        $data = Book::where('book_id', $id)->first();
        return response()->json([
            'data' => $data,
            'code' => 200
        ]);
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'publisher' => 'required',
            'publish_at' => 'required',
            'stock' => 'required',
            'category_id' => 'required|exists:category'
        ]);

        if ($validator->fails()) {
            return $this->invalid($validator->errors()->first(), $request);
        }

        $book = Book::where('book_id', $id)->first();
        $book->update([
            'cover' => !empty($request->cover) ? $this->image($request->file('cover')) : $book->cover,
            'name' => $request->name,
            'publisher' => $request->publisher,
            'publish_at' => date($request->publish_at.'-m-d'),
            'writer' => $request->writer,
            'category_id' => $request->category_id,
            'stock' => $request->stock
        ]);

        return redirect('admin/book')
            ->with('success', 'Berhasil Mengubah Buku');
    }

    public function delete($id)
    {
        Book::where('book_id', $id)->delete();

        return redirect('admin/book')
            ->with('success', 'Berhasil Menghapus Buku');
    }

    public function category()
    {
        $data = Category::get();
        return response()->json([
            'data' => $data,
            'code' => 200
        ], 200);
    }

    protected function invalid($message, $request)
    {
        return back()->withErrors(['msg' => $message])
            ->withInput($request->all());
    }

    protected function image($file)
    {
        $filename = '';
        if (!empty($file)) {
            $filename   = time().'.'.$file->getClientOriginalExtension();
            $image      = file_get_contents($file->getPathName());
            Storage::disk('public')->put("cover/".$filename, $image);
        }

        return $filename;
    }
}
