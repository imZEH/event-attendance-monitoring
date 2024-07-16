<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\UserDetail;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\UserPostRequest;
use App\Http\Requests\UserUpdateRequest;
use App\Http\Resources\UserDetailsResource;

class UserController extends Controller
 {
    /**
    * Display a listing of the resource.
    *
    * @return Response
    */

    public function index()
 {
        return UserDetailsResource::collection( UserDetail::all() );
    }

    /**
    * Store a newly created resource in storage.
    *
    * @param StorePostRequest $request
    * @return Response
    * @throws ValidationException
    */

    public function store( UserPostRequest $request )
 {
        // Create user in the User table
        $user = User::create( [
            'name' => $request->input( 'firstname' ) . ' ' . $request->input( 'lastname' ),
            'email' => $request->input( 'email' ),
            'password' => bcrypt( $request->input( 'password' ) ),
        ] );

        // Create user details in the UserDetail table
        $userDetail = UserDetail::create( [
            'firstname' => $request->input( 'firstname' ),
            'lastname' => $request->input( 'lastname' ),
            'middlename' => $request->input( 'middlename' ),
            'studentId' => $request->input( 'studentId' ),
            'birthday' => $request->input( 'birthday' ),
            'yearlevel' => $request->input( 'yearlevel' ),
            'course' => $request->input( 'course' ),
            'userType' => $request->input( 'userType' ),
            'userId' => $user->id,
        ] );

        // $mergedData = array_merge( $user->toArray(), $userDetail->toArray() );

        return response()->json( [
            'message' => 'User created successfully',
            'status_code' => 201
        ], 201 );
    }

    /**
    * Display the specified resource.
    *
    * @param Post $post
    * @return Response
    */

    public function show( $id )
 {
        $userDetails = UserDetail::with( 'user' )->find( $id );

        if ( !$userDetails ) {
            return response()->json( [ 'message' => 'User details not found' ], 404 );
        }

        return UserDetailsResource::make( $userDetails );
    }

    /**
    * Update the specified resource in storage.
    *
    * @param UpdatePostRequest $request
    * @param Post $post
    * @return Response
    * @throws ValidationException
    */

    public function update( UserUpdateRequest $request, $id )
 {
        // Find the user details by ID
        $userDetail = UserDetail::find( $id );

        if ( !$userDetail ) {
            return response()->json( [
                'message' => 'User details not found'
            ], 404 );
        }

        // Find the associated user by userId in UserDetail
        $user = User::find( $userDetail->userId );

        if ( !$user ) {
            return response()->json( [
                'message' => 'User not found',
                'status_code' => 404
            ], 404 );
        }

        // Update user details
        $user->name = $request->input( 'firstname' ) . ' ' . $request->input( 'lastname' );
        $user->email = $request->input( 'email' );

        // Update password if provided
        if ( $request->filled( 'password' ) ) {
            $user->password = bcrypt( $request->input( 'password' ) );
        }

        $user->save();

        // Update user detail fields if provided
        $userDetail->firstname = $request->input( 'firstname' );
        $userDetail->lastname = $request->input( 'lastname' );
        $userDetail->middlename = $request->input( 'middlename' );
        $userDetail->studentId = $request->input( 'studentId' );
        $userDetail->birthday = $request->input( 'birthday' );
        $userDetail->yearlevel = $request->input( 'yearlevel' );
        $userDetail->course = $request->input( 'course' );
        $userDetail->userType = $request->input( 'userType' );

        $userDetail->save();

        return response()->json( [
            'message' => 'User updated successfully',
            'status_code' => 200,
            'data' => new UserDetailsResource( $userDetail ),
        ], 200 );
    }

    /**
    * Remove the specified resource from storage.
    *
    * @param Post $post
    * @return Response
    */

    public function destroy( $id )
 {
        // Find the user details by ID
        $userDetail = UserDetail::find( $id );

        if ( !$userDetail ) {
            return response()->json( [
                'message' => 'User details not found',
                'status_code' => 404
            ], 404 );
        }

        // Delete the user details
        $userDetail->delete();

        // Find the associated user by userId in UserDetail
        $user = User::find( $userDetail->userId );

        if ( $user ) {
            // Delete the user
            $user->delete();
        }

        return response()->json( [
            'message' => 'User deleted successfully',
            'status_code' => 200
        ], 200 );
    }

}