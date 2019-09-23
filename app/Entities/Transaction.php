<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    /**
     * Table name.
     * 
     * @var string
     */
    protected $table = 'transactions';

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
        'type', 'name', 'value', 'date', 'category_id', 'user_id'
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

    public function user()
    {
        return $this->belongsTo( App\Entities\User::class );
    }

    public function category()
    {
        return $this->belongsTo( App\Entities\Category::class );
    }
}
