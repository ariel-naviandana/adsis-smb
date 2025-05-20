<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    protected $fillable = [
        'name',
        'email',
        'password',
        'department',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    public function dailyReports()
    {
        return $this->hasMany(DailyReport::class);
    }

    public function proposals()
    {
        return $this->hasMany(Proposal::class);
    }
}
