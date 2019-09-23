<?php

namespace App\Services\Transaction;

use Illuminate\Http\Request;
use App\Services\BaseService;
use App\Contracts\CategoryRepositoryInterface;

class CategoryService extends BaseService
{
    private $repository;

    public function __construct( CategoryRepositoryInterface $repository )
    {
        $this->repository = $repository;
    }

    public function list( $user_id )
    {
        return $this->repository->list( $user_id );
    }

    public function store( Request $request )
    {
        return $this->repository->store( $request );
    }

    public function destroy( int $id )
    {
        if( $this->repository->destroy( $id ) ) {
            return [
                'status' => true,
                'message' => 'Succesfull deleted.'
            ];
        }

        return [
            'status' => false,
            'message' => 'Error on delete.'
        ];
    }
}