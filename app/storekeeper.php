<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class storekeeper extends Model
{
    protected $table = 'storekeeper';
     protected $fillable = [
        'item_name', 'item_quantity', 'item_price'];
    public $timestamps = true;
}
