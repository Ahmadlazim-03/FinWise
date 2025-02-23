<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FormController extends Controller
{
    public function form(Request $request){

        if ($request->create) {
            if ($request->password === $request->repeat_password) {

                $name = htmlspecialchars($request->name);
                $phone = htmlspecialchars($request->phone);
                $email = htmlspecialchars($request->email);
                $password = htmlspecialchars($request->password);
        
                $validate = $request->validate([
                    'name' => 'required',
                    'phone' => 'required',
                    'email' => 'required|email:dns',
                    'password' => 'required|min:8'
                ]); 
        
                if ($validate) {

                    if (User::where('email', $email)->exists()) {
                        return redirect('/register')->with('emailexists', 'Email already in use !');
                    } else {
                        if (User::where('phone', $phone)->exists()) {
                            return redirect('/register')->with('phoneexists', 'Phone already in use !');
                        } else {                      
                            $createAccount = User::create([
                                'name' => $name,
                                'phone' => $phone,
                                'email' => $email,
                                'password' => bcrypt($password) 
                            ]);
                
                            if ($createAccount) {
                                return redirect('/register')->with('successregister', 'Create account successfully !');
                            }
                        }
                    }
                }
            } else {
                return redirect('/register')->with('errorpassword', 'Password and Repeat Password are not the same !');
            }
        }
        
        if ($request->login) {
          
            $email = htmlspecialchars($request->email);
            $password = htmlspecialchars($request->password);
        
            $credentials = $request->validate([
                'email' => ['required', 'email'],
                'password' => ['required'],
            ]);
        
            if (Auth::attempt($credentials)) {
                $request->session()->regenerate();
                return redirect()->intended('/dashboard');
            } else {
                return redirect('/')->with('errorlogin', 'Account Not Found!');
            }
        }
    }
}
