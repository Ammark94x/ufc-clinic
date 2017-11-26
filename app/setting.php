<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class setting extends Model
{
    protected $table = 'setting';
     protected $fillable = [
        'youtube_link'];
    public $timestamps = true;	
}
