<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class storekeeper extends Model
{
    protected $table = 'storekeeper';
     protected $fillable = [
        'product_id', 'date', 'opening','recieving','total','used','closed'];
    public $timestamps = true;
}
