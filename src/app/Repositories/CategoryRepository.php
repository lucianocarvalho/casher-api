<?php

namespace App\Repositories;

use Illuminate\Http\Request;
use App\Entities\Category;
use App\Contracts\CategoryRepositoryInterface;

class CategoryRepository implements CategoryRepositoryInterface
{
    public function list( $user_id ) : array
    {
        return Category::where('user_id', $user_id )->get()->toArray();
    }

    public function store( Request $request ) : Category
    {
        $category = new Category( $request->all() );
        $category->save();

        return $category;
    }

    public function destroy( int $id ) : bool
    {
        $category = Category::find( $id );
        
        return $category->delete();
    }
}