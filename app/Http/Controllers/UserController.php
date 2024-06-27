<?php

namespace App\Http\Controllers;

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
        return UserDetailsResource::collection(UserDetail::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StorePostRequest $request
     * @return Response
     * @throws ValidationException
     */
    public function store(UserPostRequest $request)
    {
        $validated = $request->validated();
        $userDetails = UserDetail::create($validated);
        return UserDetailsResource::make($userDetails);
    }

    /**
     * Display the specified resource.
     *
     * @param Post $post
     * @return Response
     */
    public function show($id)
    {
        $userDetails = UserDetail::find($id);
    
        if (!$userDetails) {
            return response()->json(['message' => 'User details not found'], 404);
        }
    
        return UserDetailsResource::make($userDetails);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdatePostRequest $request
     * @param Post $post
     * @return Response
     * @throws ValidationException
     */
    public function update(UserUpdateRequest $request, $id)
    {

        $userDetails = UserDetail::find($id);
    
        if (!$userDetails) {
            return response()->json(['message' => 'User details not found'], 404);
        }

        $data =[
            'firstname' => $request->firstname
        ];

       $userDetails->update($data);
        return UserDetailsResource::make($userDetails);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Post $post
     * @return Response
     */
    public function destroy($id)
    {
        $user = UserDetail::find($id);
        $user->delete();
        return response()->json( [
            'message' => 'User deleted successfully'
        ], 200 );
    }
}