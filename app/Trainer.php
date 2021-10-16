<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Trainer extends Model
{
    protected $fillable = [
        'firstname',
        'lastname',
        'dni',
        'email',
        'profesion',
        'cip',
        'firma',

    ];

    public function courses()
    {
        return $this->hasMany(Course::class);
    }

}
