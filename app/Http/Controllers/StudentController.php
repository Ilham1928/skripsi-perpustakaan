<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class StudentController extends Controller
{
    public function index()
    {
        $data = User::get();

        return view('page.student.index')
            ->with([
                'title' => "Data Siswa",
                'data' => $data,
            ]);
    }

    public function edit($id)
    {
        $data = User::where('user_id', $id)->first();
        return response()->json([
            'data' => $data,
            'code' => 200
        ]);
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'class' => 'required',
        ]);

        if ($validator->fails()) {
            return $this->invalid($validator->errors()->first(), $request);
        }

        User::where('user_id', $id)
            ->update([
                'name' => $request->name,
                'class' => $request->class
            ]);

        return redirect('admin/student')
            ->with('success', 'Berhasil Mengubah Siswa');
    }

    public function delete($id)
    {
        User::where('user_id', $id)->delete();

        return redirect('admin/student')
            ->with('success', 'Berhasil Menghapus Siswa');
    }

    protected function invalid($message, $request)
    {
        return back()->withErrors(['msg' => $message])
            ->withInput($request->all());
    }
}
