<?php

namespace App\Http\Controllers;

use App\Models\UserDetail;
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

            $userDetail = $this->getUserById($userId);

            return response()->json(['data' => $userDetail->original], 200);
        } else {
            return response()->json( [ 'error' => 'Unauthorized' ], 401 );
        }
    }

    public function getUserById($id) {
        $userDetail = UserDetail::find($id);
    
        if($userDetail) {
            return response()->json($userDetail);
        } else {
            return response()->json(['error' => 'User not found'], 404);
        }
    }
}