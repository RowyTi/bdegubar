<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;


class Staff extends Authenticatable
{
    use Notifiable, HasApiTokens, HasFactory, HasRoles, SoftDeletes;

    protected $guard_name = 'sanctum';
    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'branch_id' => 'integer',
        'profile_id' => 'integer',
    ];
    public function scopeUsername(Builder $query, $value)
    {
        $query->where('Username', '!=', $value);
    }

    public function scopeRole(Builder $query, $values)
    {
        $query->whereHas('roles', function($q) use ($values) {
            $q->whereIn('name', explode(',', $values));
        });
    }

    public function branch()
    {
        return $this->belongsTo(Branch::class);
    }

    public function profile()
    {
        return $this->belongsTo(Profile::class);
    }
}
