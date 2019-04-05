<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $fillable = [
        'name', 'start_date', 'end_date', 'content', 'is_featured', 'cv_id'
    ];

    public function cv()
    {
        return $this->belongsTo(Cv::class);
    }
}
