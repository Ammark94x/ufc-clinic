<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Expenses extends Model
{
    protected $table = 'expenses';
    protected $fillable = ['type', 'expense', 'amount', 'date','quantity'];
}
