<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Jenssegers\Date\Date;

class Calendar extends Model
{

    protected $fillable = [
        "user_id",
        "course_id",
        "descripcion",
        "event_name",
        "start_date",
        "fecha_fin",
        "fin",
    ];


    public function getStartDateAttribute($start_date)
    {
        return new Date($start_date);
    }


    public function getFechaFinAttribute($fecha_fin)
    {
        return new Date($fecha_fin);
    }

   public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function course()
    {
        return $this->belongsTo(Course::class);
    }
}
