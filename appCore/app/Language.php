<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Language extends Model
{
    protected $table = 'locale';
    protected $guarded = ['id']; //
}
