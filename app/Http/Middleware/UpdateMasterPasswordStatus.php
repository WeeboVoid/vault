<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\Response;

class UpdateMasterPasswordStatus
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {

        $user = Auth::user();
        
        if ($user && $user->master_password_set == 1) {
            // Check if the user's session is still valid
            if (!Auth::check()) {
                // User session expired or invalid, update master_password_set to 0
                DB::table('users')->where('id', $user->id)->update(['master_password_set' => 0]);
            }
        }
        return $next($request);
    }
}
