<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class reservation extends Model
{
    protected $table = 'reservations';

    protected $fillable = ['code','fk_specialistID','dateTime', 'status'];

  public $timestamps = false;
}
