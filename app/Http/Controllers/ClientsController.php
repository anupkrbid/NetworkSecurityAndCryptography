<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\FunctionValue;
use App\EncryptedCoefficient;
use Auth;


class ClientsController extends Controller
{
    public function profile(Request $request)
    {
    	$user = User::find(Auth::user()->id);
    	$functionValues = FunctionValue::where('x', '=', $user->id)->first();
    	$encryptedCoefficients = EncryptedCoefficient::all();
    	return view('client.profile', 
    		['user' => $user], 
    		['functionValues' => $functionValues, 'encryptedCoefficients' => $encryptedCoefficients]);
    }

    public function verifyKey(Request $request, $id)
    {
       	$verificationResult = FunctionValue::verify($id);
       	if($verificationResult){
       		$user = User::find($id);
       		$user->isVerified = 1;
       		$user->save();
			return redirect()->back()->with('success', "Verification Successful!");
		} else {
			return redirect()->back()->with('error', "Verification Unsuccessful!");
		}
    }

    public function decryptKey(Request $request)
    {
    	// $users = User::where('isDealer','=','0')->get();
    	// return view('dealer.dashboard', ['users' => $users]);
    	return view('client.profile');
    }
}
