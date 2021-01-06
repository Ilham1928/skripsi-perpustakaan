<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Admin;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class LoginController extends Controller
{
    public function index()
    {
        return view('page.auth.login')
            ->with(['title' => "Perpustakaan Online"]);
    }

    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'account' => 'required',
            'password' => 'required|min:6',
        ]);

        if ($validator->fails())
        {
            return $this->invalid($validator->errors()->first(), $request);
        }

        $admin = Admin::where('email', $request->account)->first();
        $user  = User::where('nisn', $request->account)->first();

        if (!$admin && !$user) {
            return $this->invalid('Tidak Ada User Dengan Email Ini!', $request);
        }

        if ($admin) {
            if (!Hash::check($request->password, $admin->password)) {
                return $this->invalid('Email atau password salah', $request);
            }

            $token = Str::uuid($admin->password);
            setcookie('token-' , $token, time() + (86400 * 30), "/");
            setcookie('__idx', $admin->admin_id, time() + (86400 * 30), "/");
            setcookie('is_admin', 'true', time() + (86400 * 30), "/");

        }else{
            if (!Hash::check($request->password, $user->password)) {
                return $this->invalid('Email atau password salah', $request);
            }

            $token = Str::uuid($user->password);
            setcookie('token-', $token, time() + (86400 * 30), "/");
            setcookie('__idx', $user->user_id, time() + (86400 * 30), "/");
            setcookie('is_user', 'true', time() + (86400 * 30), "/");
        }

        if ($admin) return redirect('/admin/dashboard');
        if ($user) return redirect('/');
    }

    public function logout()
    {
        setcookie('token', null, "/");
        setcookie('__idx', null, "/");
        setcookie('is_user', null, "/");
        setcookie('is_admin', null, "/");

        return redirect('/');
    }

    protected function invalid($message, $request)
    {
        return back()->withErrors(['msg' => $message])
            ->withInput($request->all());
    }
}
