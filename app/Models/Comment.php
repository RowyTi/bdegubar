<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
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
        'rating' => 'float',
        'branch_id' => 'integer',
        'user_id' => 'integer',
    ];


    public function branch()
    {
        return $this->belongsTo(\App\Models\Branch::class);
    }

    public function user()
    {
        return $this->belongsTo(\App\Models\User::class);
    }
}
