<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class excursion extends Model
{
    protected $fillable = ['name','user_id','id','description'];
}
