<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class marker extends Model
{
    protected $fillable = ['name','lat','lng','pic','description'];
}
