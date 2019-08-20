<?php

namespace App\Http\Controllers;

use App\Entities\Movimentation;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;

class MovimentationController extends Controller
{
	/**
	 * List all records.
	 * 
	 * @return Illuminate\Http\JsonResponse
	 */
	public function index() : JsonResponse
	{
        return response()->json( Movimentation::all() );
	}

	public function summary( $user_id )
	{
		$result = DB::table('movimentations')->select(DB::raw('SUM(value)') )->where('user_id', $user_id )->get();

		return response()->json([
			'balance' => (double)$result->first()->sum,
			'positive_balance' => ( $result->first()->sum > 0 )
		], 200 );
	}

	public function list( $user_id )
	{
		$movimentations = Movimentation::where('user_id', $user_id)->get();

		return response()->json([
			'entries' => count( $movimentations ),
			'hits' => $movimentations
		], 200 );
	}

	public function store( Request $request )
	{
		$movimentation = new Movimentation( $request->all() );

		if( ! isset( $request->date ) )
			$movimentation->date = date('Y-m-d H:i:s');

		$movimentation->save();

		return response()->json($movimentation, 201);
	}

	public function destroy( $id )	
	{
		$movimentation = Movimentation::find($id);

        if( ! $movimentation ) {
            return response()->json([
                'message'   => 'Record not found',
            ], 404);
        }

        if( $movimentation->delete() ) {
			return response()->json([
        		'status' => true
        	], 204);
        }        
	}
}