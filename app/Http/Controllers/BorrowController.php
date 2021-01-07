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
        $data = UserBorrow::get();

        return view('page.category.index')
            ->with([
                'title' => "Kategori Buku",
                'data' => $data,
            ]);
    }

    public function edit($id)
    {
        $data = UserBorrow::where('category_id', $id)->first();
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

        UserBorrow::where('category_id', $id)->update(['name' => $request->name]);

        return redirect('admin/category')
            ->with('success', 'Berhasil Mengubah Kategori');
    }

    public function delete($id)
    {
        UserBorrow::where('category_id', $id)->delete();

        return redirect('admin/category')
            ->with('success', 'Berhasil Menghapus Kategori');
    }

    protected function invalid($message, $request)
    {
        return back()->withErrors(['msg' => $message])
            ->withInput($request->all());
    }
}
