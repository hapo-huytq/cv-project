<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
class Admin extends Authenticatable
{
    use Notifiable;
    use SoftDeletes;

    const SUPER_ADMIN_ROLE = 1;
    const ADMIN_ROLE = 2;
    const HR_ROLE = 3;

    protected $fillable = [
        'name', 'email', 'password', 'phone', 'avatar'
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];
}
