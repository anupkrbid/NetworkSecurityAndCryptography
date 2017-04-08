<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomesController extends Controller
{
    
    public function register(Request $request)
    {
        $users = User::where('email', '=', $request->email)->first();

        if ($users)
        {
            return redirect()->back()->with('error','Oops..! Email already Registered.');
        }
        else 
        {
            $user = new User();
            if ($request->password==$request->cnf_password) 
            {
                // Request a new data using the requst data
                $user->first_name = $request->name;
                $user->isAdmin = 1;
                $user->email = $request->email;
                $user->password = bcrypt($request->password);
                // Save if to the database
                $user->save();
                // Redirect to the homepage
                return redirect()->back()->with('success','Good Job..! You are Registered.');
            } 
            else 
            {
                return redirect()->back()->with('error','Oops..! Password did not Match.');;
            }
        }
    }
    public function login(Request $request)
    {
        /** Attempt to authenticate the user */
        if ( auth()->attempt(request(['email','password'])) ) {
            $users = User::where('email', '=', $request->email)->first();
            if ( $users->isAdmin == 1 ) {
                return redirect()->route('dealer.get.dashboard');
            } else {
                return redirect()->route('client.get.profile');
            }
        } else {
            return redirect()->back()->with('error','Oops..! Invalid Credentials.');
        }
    
    }
    public function logout()
    {
        Auth::logout();
        return redirect()->route('app.get.home');
    }


}
