<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class History extends Model
{
    protected $fillable = [
        'start_year', 'end_year', 'name', 'position', 'content', 'type', 'cv_id'
    ];

    public function cv()
    {
        return $this->belongsTo(Cv::class);
    }
}
