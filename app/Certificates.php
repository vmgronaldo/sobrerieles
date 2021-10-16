<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Certificates extends Model
{
    protected $guarded = [];

    protected $fillable = [
        "model_type",
        "model_id",
        "course_id",
        "date",
    ];

    public function model()
    {
        return $this->morphTo("model");
    }

    public function course()
    {
        return $this->belongsTo(Course::class);
    }


}
