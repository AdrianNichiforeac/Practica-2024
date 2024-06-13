<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

class Admin extends Authenticatable
{
    use Notifiable;

    protected $guarded = ['id'];

    protected $hidden = [
        'password', 'remember_token',
    ];

    public function roles()
    {
        return $this->belongsToMany(Role::class, 'role_admin');
    }

    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = hash::make($value);
    }

    /**
     * Verify if admin has role
     * @param $role_name
     * @return bool
     */
    public function adminHasRole($role_name)
    {
        foreach ($this->roles as $role) {
            if (Str::lower($role_name) == Str::lower($role->name))
                return true;
        }
        return false;
    }
}
