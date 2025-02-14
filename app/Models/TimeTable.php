<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TimeTable extends Model
{
    protected $fillable = ['day_of_week', 'morning', 'afternoon', 'evening'];
}
