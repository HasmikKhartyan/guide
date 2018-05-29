<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Marker extends Model
{
    protected $fillable = [
        'name', 'position'
    ];

//
//    protected $hidden = [
//        'password', 'remember_token',
//    ];
    public function users()
    {
        return $this->belongsToMany(User::class, 'user_markers');
//        return $this->belongsToMany(User::class, 'user_markers'));//->withPivot(['user_id','marker_id','visited']);
    }
}
