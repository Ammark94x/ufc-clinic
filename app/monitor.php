<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class monitor extends Model
{
     protected $table = 'monitor';
     protected $fillable = [
        'present_weight', 'result', 'weight','full_payment','balance','products','product_quantity','gender','neck','chest','side_buns','waist','hips','thighs','arms','lower_waist','total_inches','dov','payment_recieved','user_id'];
    public $timestamps = true;
}
