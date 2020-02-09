<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Mockery;

class CategoryControllerTest extends TestCase
{
    public function setUp() : void
    {
        $this->dependencies = [
            'CategoryService' => Mockery::mock( \App\Services\Transaction\CategoryService::class )
        ];

        $this->otherDependencies = [
            'Request' => Mockery::mock( \Illuminate\Http\Request::class ),
            'Category' => Mockery::mock( \App\Entities\Category::class ),
        ];

        $this->testedClass = new \App\Http\Controllers\CategoryController( ...array_values( $this->dependencies ) );
    }

    public function testList()
    {
        $this->dependencies['CategoryService']
            ->shouldReceive('list')
            ->once()
            ->with( 1 )
            ->andReturn( array() );

        $return = $this->testedClass->list( 1 );

        $this->assertIsArray( $return );
    }

    public function testStore()
    {
        $this->dependencies['CategoryService']
            ->shouldReceive('store')
            ->once()
            ->with( $this->otherDependencies['Request'] )
            ->andReturn( $this->otherDependencies['Category'] );

        $return = $this->testedClass->store( $this->otherDependencies['Request'] );

        $this->assertEquals( $return, $this->otherDependencies['Category'] );
    }

    public function testDestroy()
    {
        $this->dependencies['CategoryService']
            ->shouldReceive('destroy')
            ->once()
            ->with( 1 )
            ->andReturn( true );

        $return = $this->testedClass->destroy( 1 );

        $this->assertTrue( $return );
    }
}
