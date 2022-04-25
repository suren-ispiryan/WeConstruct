<?php

namespace App\Http\Controllers;
// Facades
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendMail;


// Requests
use Illuminate\Http\Request;
// Models
use App\Models\User;


class SignController extends Controller
{
    public function showRegister(){
        session()->forget('linkSent');
        return view('register');
    }

    public function showLogin(){
        return view('login');
    }

    public function registerUser(Request $request) {
        // $request->validate([
        //     'name'=>'string|required|min:2',
        //     'email'=>'email|required|unique:users',
        //     'password'=>'confirmed|required|min:6|max:15',
        //     'repeatpassword'=>'required|min:6|max:15',
        //     'usertype'=>'required',
        // ]);
        
        $user = User::create([
            'name' => $request->name,
            'surname' => $request->surname,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'usertype' => $request->usertype
        ]);
        if($user) {
            Auth::login($user); // put in session
            $mailData = [
                'title' => 'Mail from WeConstruct.com',
                'body' => 'This is for testing email using smtp.'
            ];
            Mail::to('suren.ispiryan2016@gmail.com')->send(new SendMail($mailData));    

            session(['linkSent' => "Verification link has been sent"]);
            return redirect('/login');
        }
        return abort(403);
    }

    public function loginUser(Request $request) {
        $email = $request->email;
        $password = $request->password;
        $credentials = [
            'email' => $email,
            'password' => $password
        ];

        if (Auth::attempt($credentials)) {
            if(Auth::User()->usertype == "admin"){
                return redirect('/admin-dashboard');
            }
            else if(Auth::User()->usertype == "user"){
                return redirect('/user-dashboard');    
            }
        }else{
            $errLogin = 'Username or password is incorrect';
            return view('login')->with('errLogin', $errLogin);
        }      
    }

    public function logOut(){
        Auth::logout();
        return redirect('/');
    }
}
