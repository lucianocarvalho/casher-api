<?php

namespace App\Http\Controllers;

use App\Entities\Movimentation;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

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
}
