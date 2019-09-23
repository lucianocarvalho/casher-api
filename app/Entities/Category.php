<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    /**
     * Table name.
     * 
     * @var string
     */
    protected $table = 'categories';

    /**
     * Guarded fields.
     * 
     * @var array
     */
    protected $guarded = [
        'id'
    ];

    /**
     * Mass-assigned fields.
     * 
     * @var array
     */
    protected $fillable = [
        'name', 'user_id'
    ];

    /**
     * Attributtes casts.
     * 
     * @var array
     */
    protected $casts = [
        'name' => 'string',
    ];
}
