<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class DealersController extends Controller
{
    public function dashboard(Request $request)
    {
    	$users = User::where('isDealer','=','0')->get();
    	return view('dealer.dashboard', ['users' => $users]);
    }

    public function newClient()
    {
    	return view('dealer.newClient');
    }

    public function addClient(Request $request)
    {
    	$user = User::where('email', '=', $request->email)->first();
        
        if ($user) {
            return redirect()->back()->with('error', "Sorry this email is already registerd!");
        } else {
            $user = new User();
            if ($request->password==$request->cnf_password) {
                /** Request a new data using the requst data */
                $user->name = $request->name;
                $user->email = $request->email;
                $user->password = bcrypt($request->password);
                /* Save if to the database */
                if ($user->save()) {
                    /** Redirect back to add user page */
                    return redirect()->back()->with('success', "Successfully added a new client!");
                } else {
                    return redirect()->back()->with('error', "Something went wrong, please try again later!");
                }
            } else {
                return redirect()->back()->with('error', "Password and confirm password should be matched!");
            }
        }
    }

    public function deleteClient($id)
    {
        $user = User::find($id);
        if ($user) {
            if ($user->delete()) {
                return redirect()->back()->with('success', "Successfully deleted this client!");
            } else {
                return redirect()->back()->with('error', "Something went wrong, please try again later!");
            }
        } else {
            return redirect()->back()->with('error', "Sorry this client doen't exist!");
        }
    }
}
