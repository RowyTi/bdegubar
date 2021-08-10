<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
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
        'DateOfBirth' => 'date',
        'address_id' => 'integer',
    ];


    public function staff()
    {
        return $this->hasOne(\App\Models\Staff::class);
    }

    public function user()
    {
        return $this->hasOne(\App\Models\User::class);
    }

    public function address()
    {
        return $this->belongsTo(\App\Models\Address::class);
    }
}
