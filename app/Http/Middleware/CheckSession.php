<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckSession
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle($request, Closure $next)
    {
        $sessionToken = $request->cookie('session_token');
        $idUser = $request->cookie('id_user');

        if ($sessionToken && $idUser) {
            $user = User::where('id_user', $idUser)
                ->where('session_token', $sessionToken)
                ->first();

            if ($user) {
                Auth::login($user);
                return $next($request);
            }
        }

        return redirect()->route('login')->with('error', 'Sesi Anda telah berakhir. Silakan login kembali.');
    }
}