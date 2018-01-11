<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NextVisits extends Model
{
    protected $table = 'next_visits';
    protected $fillable = ['user_id','date','notify'];
    public $timestamps = false;
}
