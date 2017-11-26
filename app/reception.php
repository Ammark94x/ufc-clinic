<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class reception extends Model
{
    protected $table = 'reception';
    protected $fillable = ['name','email','phone_number','gender'];
    public $timestamps = false;
    protected $hidden = [
        'password', 'remember_token',
    ];
}
