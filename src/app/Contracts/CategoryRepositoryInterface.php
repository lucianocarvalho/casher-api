<?php

namespace App\Contracts;

use Illuminate\Http\Request;
use App\Entities\Category;

interface CategoryRepositoryInterface
{
    public function list( int $user_id ) : array;
    public function store( Request $request ) : Category;
    public function destroy( int $id ) : bool;
}