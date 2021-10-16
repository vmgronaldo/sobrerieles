<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categories extends Model
{
    protected $fillable = [
        'name',
        'status',
    ];
    public function courses()
    {
        return $this->hasMany(Course::class);
    }

}
