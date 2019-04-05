<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Reference extends Model
{
    protected $fillable = [
        'image', 'end_year', 'content', 'cv_id',
    ];

    public function cv()
    {
        return $this->belongsTo(Cv::class);
    }
}
