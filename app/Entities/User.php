<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    /**
     * Table name.
     * 
     * @var string
     */
    protected $table = 'users';

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
        'name', 'email', 'password'
    ];

    /**
     * Attributtes casts.
     * 
     * @var array
     */
    protected $casts = [
        'name' => 'string',
        'email' => 'string',
        'password' => 'string'
    ];
}
