<?php

namespace App\Http\Middleware;

use App\Models\AccessLevel;
use Closure;
use Illuminate\Support\Facades\Auth;

class Admin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
    	if(!AccessLevel::isUserAdmin()) {
            return redirect()
                ->back()
                ->with('error', t('Sorry, but you have no right for that website area because you are not admin.'));
        }
        
        return $next($request);
    }
}
