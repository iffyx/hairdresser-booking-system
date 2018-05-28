<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    protected $fillable = [
        'name', 'surname', 'mobile', 'email', 'service_id', 'date', 'time'
    ];
}
