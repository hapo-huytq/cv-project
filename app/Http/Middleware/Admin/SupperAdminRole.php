<?php

namespace App\Http\Middleware\Admin;

use App\Models\Admin;
use Closure;
use Illuminate\Support\Facades\Auth;

class SupperAdminRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = 'admin')
    {
        if( Auth::guard($guard)->user()->id === Admin::SUPER_ADMIN_ROLE) {
            return $next($request);
        } else {
            return redirect()->back();
        }

    }
}
