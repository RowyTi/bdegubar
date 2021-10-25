<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Branch extends Model
{
    use HasFactory, SoftDeletes;

    protected $guard_name = 'sanctum';
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
        'address_id' => 'integer',
    ];


    public function paymentkey()
    {
        return $this->hasOne(Paymentkey::class);
    }

    public function tables()
    {
        return $this->hasMany(Table::class);
    }

    public function staff()
    {
        return $this->hasMany(Staff::class);
    }

    public function products()
    {
        return $this->hasMany(Product::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }

    public function address()
    {
        return $this->belongsTo(Address::class);
    }
}
