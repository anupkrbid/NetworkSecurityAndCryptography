<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\EncryptedCoefficient;
use App\FunctionValue;


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

    public function encrypt(Request $request)
    {
        $user = User::orderBy('id', 'desc')->first();  // Getting id of the last user added
        // dd($user->id);
        return view('dealer.encrypt', ['maxid' => $user->id]);
    }
    
    public function encryptKey(Request $request)
    {
        User::where('isDealer', 0)->update(['isVerified' => 0]);
        // if(User::where('isDealer', 0)->update(['isVerified' => 0])){
        //     return response()->json([
        //             'isMatched' => false, 
        //             'error' => "Couldnot mass update users"
        //         ]);
        // }

        $encrypted_coefficient = EncryptedCoefficient::all();
        if($encrypted_coefficient) {
            EncryptedCoefficient::truncate();
        }

        $function_value = FunctionValue::all();
        if($function_value) {
            FunctionValue::truncate();
        }

        foreach ($request->FunctionValue as $key => $value) {
            $function_value = new FunctionValue();

            $function_value->x = $key;
            $function_value->fx = $value;
            $function_value->base = $request->Base;
            $function_value->modulus = $request->Modulus;

            if ( !($function_value->save()) ) {
                return response()->json([
                    'isMatched' => false, 
                    'error' => "Couldnot complete FunctionValue update"
                ]);
            }
        }

        foreach ($request->EncryptedCoefficient as $key => $value) {
            $encrypted_coefficient = new EncryptedCoefficient();

            $encrypted_coefficient->a = $key;
            $encrypted_coefficient->Ea = $value;

            if ( !($encrypted_coefficient->save()) ) {
                return response()->json([
                    'isMatched' => false, 
                    'error' => "Couldnot complete EncryptedCoefficient update"
                ]);
            }
        }

        return response()->json([
            'isMatched' => true, 
            'error' => "Encryption Completed"
        ]);

    }

}
