<?php

namespace App\Http\Controllers;

use App\Entities\User;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
	/**
	 * List all records.
	 * 
	 * @return Illuminate\Http\JsonResponse
	 */
	public function index() : JsonResponse
	{
        return response()->json( User::all() );
	}

	/**
	 * Show a specific record.
	 *
	 * @param int $id
	 * @return Illuminate\Http\JsonResponse
	 */
	public function show( $id ) : JsonResponse
	{
		$user = User::find($id);

        if( ! $user ) {
            return response()->json([
            	'status' => false,
                'message' => 'Record not found',
            ], 404 );
        }

        return response()->json( $user );
	}

	/**
	 * Create a new record.
	 *
	 * @param Illuminate\Http\Request $request
	 * @return Illuminate\Http\JsonResponse
	 */
	public function store(Request $request) : JsonResponse
	{
		$user = new User( $request->all() );
		$user->save();
		return response()->json($user, 201);
	}

	/**
	 * Update a record.
	 *
	 * 
	 */
	public function update( $id ) : JsonResponse
	{
		$user = User::find( $id );

        if( ! $user ) {
            return response()->json([
                'message'   => 'Record not found',
            ], 404);
        }

        $user->fill( $request->all() );
        $user->save();

        return response()->json( $user );
	}

	/**
	 * Delete a record.
	 *
	 * @param int $id
	 * @return Illuminate\Http\JsonResponse
	 */
	public function destroy( $id ) : JsonResponse
	{
		$user = User::find($id);

        if( ! $user ) {
            return response()->json([
                'message'   => 'Record not found',
            ], 404);
        }

        $user->delete();

        return response()->json([
        	'status' => true
        ], 204);
	}

	/**
	 * Login method.
	 * @param  Request $request
	 * @return Illuminate\Http\JsonResponse
	 */
	public function login( Request $request )
	{
		$users = User::where('email', $request->email )
					->where('password', $request->password )
					->get();

		if( $users->count() ) {
			return response()->json([
				'status' => true,
				'user_id' => $users->first()->id,
				'name' => $users->first()->name,
				'email' => $users->first()->email
            ], 200 );
		}

		return response()->json([
        	'status' => false,
        	'error' => 'Bad credentials'
        ], 400 );
	}
}
