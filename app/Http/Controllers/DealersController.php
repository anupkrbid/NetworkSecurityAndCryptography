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
