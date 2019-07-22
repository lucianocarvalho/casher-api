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
}