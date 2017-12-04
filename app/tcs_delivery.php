<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tcs_delivery extends Model
{
    protected $table = 'tcs_delivery';
    protected $fillable = [
        'date', 'name', 'area','amount','status','package'];
    public $timestamps = true;
}
