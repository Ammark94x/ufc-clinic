<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class visitor extends Model
{
    protected $table = 'visitors';
     protected $fillable = [
        'name', 'fb_msg', 'type','phone_number','date','status','source','area','link_from','gender'];
    public $timestamps = true;
}
