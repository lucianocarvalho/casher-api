<?php

namespace App\Http\Controllers;

use App\Entities\Category;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class CategoryController extends Controller
{
	public function list( $user_id ) : JsonResponse
	{
		return response()->json( Category::where('user_id', $user_id )->get() );
	}

	public function store( Request $request ) : JsonResponse
	{
		$category = new Category( $request->all() );
		$category->save();

		return response()->json($category, 201);
	}

	public function destroy( $id ) : JsonResponse
	{
		$category = Category::find($id);

		if( ! $category ) {
            return response()->json([
                'message'   => 'Record not found',
            ], 404);
        }

        if( $category->delete() ) {
			return response()->json([
        		'status' => true
        	], 204);
        }
	}
}
