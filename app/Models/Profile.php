<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;

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
        'dateOfBirth' => 'date',
        'address_id' => 'integer',
    ];


    public function staff()
    {
        return $this->hasOne(Staff::class);
    }

    public function user()
    {
        return $this->hasOne(User::class);
    }

    public function address()
    {
        return $this->belongsTo(Address::class);
    }
}
