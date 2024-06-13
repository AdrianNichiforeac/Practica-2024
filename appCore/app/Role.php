<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $guarded = [];
    protected $primaryKey = "id";

    public function admins(){
        return $this->belongsToMany(Admin::class);
    }
}
