<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Translatable extends Model
{
    protected $table = 'language_lines';
    protected $guarded = ['id']; //
}
