<?php

namespace App\Http\Middleware;

use App\Models\admin;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class checkAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if(Auth::guard('admin')->check()){
                return $next($request);
        }
        toastr()->warning('Đăng nhập để tiếp tục !');
        return redirect('/admin/login');

    }
}
