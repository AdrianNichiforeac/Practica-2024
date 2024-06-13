<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
class OperatorRegistration extends Model

{
    protected $guarded = ['id'];

    public function states(){
        return $this->hasOne(States::class, 'id', 'state_id');
    }
}
