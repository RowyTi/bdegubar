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

    public function getRouteKeyName(): string
    {
        return 'slug';
    }

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


    public function tables()
    {
        return $this->hasMany(\App\Models\Table::class);
    }

    public function staff()
    {
        return $this->hasMany(\App\Models\Staff::class);
    }

    public function products()
    {
        return $this->hasMany(\App\Models\Product::class);
    }

    public function comments()
    {
        return $this->hasMany(\App\Models\Comment::class);
    }

    public function categories()
    {
        return $this->belongsToMany(\App\Models\Category::class);
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
