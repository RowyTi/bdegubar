<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
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
    ];


    public function menu()
    {
        return $this->hasOne(\App\Models\Menu::class);
    }

    public function paymentKey()
    {
        return $this->hasOne(\App\Models\PaymentKey::class);
    }

    public function staff()
    {
        return $this->hasMany(\App\Models\Staff::class);
    }

    public function branches()
    {
        return $this->hasMany(\App\Models\Branch::class);
    }
}
