<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Cv extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'title', 'name', 'birthday', 'position', 'phone', 'email', 'facebook',
        'skype', 'chatwork', 'address', 'summary', 'big_image', 'small_image',
        'professional_skill_desc', 'personal_skill_desc', 'work_exp_desc', 'education_desc', 'user_id'
    ];

    public function histories()
    {
        return $this->hasMany(History::class);
    }

    public function projects()
    {
        return $this->hasMany(Project::class);
    }

    public function references()
    {
        return $this->hasMany(Reference::class);
    }

    public function skills()
    {
        return  $this->belongsToMany(Skill::class)->withPivot('percent');
    }
}
