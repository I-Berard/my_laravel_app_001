<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;

class PasswordResetController extends Controller {
    //
    public function sendResetLink(Request $request){
        $request->validate(['email' => 'required|email']);

        $status = Password::sendResetLink($request->only('email'));

        return $status === Password::RESET_LINK_SENT 
            ? response()->json(['message' => 'Reset link sent']) 
            : response()->json(['error' => 'Unable to send reset link'], 500);
            
    
    }
}
