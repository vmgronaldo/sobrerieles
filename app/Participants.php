<?php

namespace App;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;


class Participants extends Model
{
    use Notifiable;
    protected $fillable = [
        'tipo',
        'firstname',
        'lastname',
        'email',
        'dni'
    ];

    public function certificates()
    {
        return $this->morphMany(Certificates::class,'model');
    }


}
