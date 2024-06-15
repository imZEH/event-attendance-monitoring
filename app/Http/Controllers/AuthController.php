<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
 {
    public function login( Request $request )
    {
        $credentials = $request->only( 'email', 'password' );

        if ( Auth::attempt( $credentials ) ) {
            $user = Auth::user();
            //$token = $user->createToken( 'event_attendance_monitoring' )->accessToken;

            $userId = $user->id;

            return response()->json(['token' => 'Success', 'user_id' => $userId], 200);
        } else {
            return response()->json( [ 'error' => 'Unauthorized' ], 401 );
        }
    }
}