<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\Transaction\CategoryService;

class CategoryController extends Controller
{
    private $categoryService;

    /**
     * @param App\Services\Transaction\CategoryService $categoryService
     */
    public function __construct( CategoryService $categoryService )
    {
        $this->categoryService = $categoryService;
    }

    /**
     * @param int $user_id
     * @return array
     */
    public function list( $user_id )
    {
        return $this->categoryService->list( $user_id );
    }

    /**
     * @param Illuminate\Http\Request $request
     * @return App\Entities\Category
     */
    public function store( Request $request )
    {
        return $this->categoryService->store( $request );
    }

    /**
     * @param int $id
     * @return array
     */
    public function destroy( $id )
    {
        return $this->categoryService->destroy( $id );
    }
}