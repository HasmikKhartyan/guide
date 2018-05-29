<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserMarker extends Model
{
    protected $fillable = [
        'user_id', 'marker_id','visited'
    ];
}
