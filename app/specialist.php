<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class specialist extends Model
{
    protected $table = 'specialists';

    protected $fillable = ['specialist_ID','name','surname', 'fk_userID'];

  public $timestamps = false;
}
