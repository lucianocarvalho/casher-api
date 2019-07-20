<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;

class Movimentation extends Model
{
    /**
	 * Table name.
	 * 
	 * @var string
	 */
	protected $table = 'movimentations';

	/**
	 * Guarded fields.
	 * 
	 * @var array
	 */
	protected $guarded = [
		'id', 'user_id'
	];

	/**
	 * Mass-assigned fields.
	 * 
	 * @var array
	 */
	protected $fillable = [
		'type', 'value', 'date', 'category_id'
	];

	/**
	 * Attributtes casts.
	 * 
	 * @var array
	 */
	protected $casts = [
        'type' => 'string',
        'value' => 'double',
        'date' => 'datetime'
    ];
}
