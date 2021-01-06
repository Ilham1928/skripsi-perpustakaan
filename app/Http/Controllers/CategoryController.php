<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
{
    public function index()
    {
        $data = Category::get();

        return view('page.category.index')
            ->with([
                'title' => "Kategori Buku",
                'data' => $data,
            ]);
    }


    public function create(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
        ]);

        if ($validator->fails()) {
            return $this->invalid($validator->errors()->first(), $request);
        }

        Category::create([
            'name' => $request->name
        ]);

        return redirect('admin/category')
            ->with('success', 'Berhasil Membuat Kategori');
    }

    public function edit($id)
    {
        $data = Category::where('category_id', $id)->first();
        return response()->json([
            'data' => $data,
            'code' => 200
        ]);
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
        ]);

        if ($validator->fails()) {
            return $this->invalid($validator->errors()->first(), $request);
        }

        Category::where('category_id', $id)->update(['name' => $request->name]);

        return redirect('admin/category')
            ->with('success', 'Berhasil Mengubah Kategori');
    }

    public function delete($id)
    {
        Category::where('category_id', $id)->delete();

        return redirect('admin/category')
            ->with('success', 'Berhasil Menghapus Kategori');
    }

    protected function invalid($message, $request)
    {
        return back()->withErrors(['msg' => $message])
            ->withInput($request->all());
    }
}
