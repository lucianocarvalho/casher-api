<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    /**
     * Table name.
     * 
     * @var string
     */
    protected $table = 'tags';

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
        'name', 'transaction_id'
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
