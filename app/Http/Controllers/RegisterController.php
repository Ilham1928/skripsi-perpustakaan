<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    public function index()
    {
        return view('page.auth.register')
            ->with(['title' => "Perpustakaan Online"]);
    }

    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'nisn' => 'required|numeric|unique:user',
            'class' => 'required',
            'password' => 'required|min:6',
        ]);

        if ($validator->fails())
        {
            return $this->invalid($validator->errors()->first(), $request);
        }

        User::create([
            'name' => $request->name,
            'nisn' => $request->nisn,
            'class' => $request->class,
            'password' => Hash::make($request->password)
        ]);

        return redirect('login')->with('success', 'Berhasil Mendaftar');
    }

    protected function invalid($message, $request)
    {
        return back()->withErrors(['msg' => $message])
            ->withInput($request->all());
    }
}
