<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Models\User;
use Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Session;

class AuthController extends Controller
{
    //
    public function index() {
        return view('Auth.login');
    }

    public function registration() {
        return view('Auth.register');
    }
    public function validate_registration(UserRequest $request) {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6'
        ]);
        $data = $request->all();

        User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password'])
        ]);

        return redirect('login')->with('Success', 'Resgistration Completed, now you can login');
    }

    public function validate_login(Request $request) {
//        $validate = $request->validate([
//            'email' => 'required',
//            'password' => 'required'
//        ], [
//            'email.required' => 'Vui lòng nhập email',
//            'password.required' => 'Vui lòng nhập mật khẩu'
//        ]);

//        $validator = Validator::make($request->all())
            $email = $request->input('email');
            $password = $request->input('password');
            if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
                return redirect('/');
            } else {
//                Session::flash('error', 'Email hoặc mật khẩu không đúng !!!');

                return redirect('/login')->withErrors(['password'=>'Tài khoản hoặc mật ko đúng!!!']);
            }
        }

    public function dashboard() {
        if (Auth::check()) {
            return view('index');
        }

        return redirect('login')->with('Success', 'You are not allowed to access');
    }
    public function logout() {
        Session::flush();
        Auth::logout();

        return redirect('login');

    }
}
