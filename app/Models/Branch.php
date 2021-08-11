<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Branch extends Model
{
    use HasFactory;

    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'customer_id' => 'integer',
        'address_id' => 'integer',
    ];

    public function getRouteKeyName(): string
    {
        return 'slug';
    }

    public function tables()
    {
        return $this->hasMany(\App\Models\Table::class);
    }

    public function customer()
    {
        return $this->belongsTo(\App\Models\Customer::class);
    }

    public function address()
    {
        return $this->belongsTo(\App\Models\Address::class);
    }
}
