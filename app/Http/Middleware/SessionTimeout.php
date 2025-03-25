<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class SessionTimeout
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Cek jika user sudah login
        if (Auth::check()) {
            $lastActivity = session('last_activity');
            $timeout = config('session.lifetime') * 60; // Convert menit ke detik
            
            // Jika waktu timeout terlewati
            if (time() - $lastActivity > $timeout) {
                Auth::logout();
                $request->session()->invalidate();
                return redirect()->route('loginuser')->with('message', 'Session Anda telah habis, silakan login kembali');
            }
            
            // Update last activity time
            session(['last_activity' => time()]);
        }
        
        return $next($request);
    }
}