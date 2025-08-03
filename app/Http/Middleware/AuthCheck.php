<?php

namespace App\Http\Middleware;

use App\Exceptions\AuthenticationException;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Symfony\Component\HttpFoundation\Response;

class AuthCheck
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $status = Http::withHeaders([
            'Authorization' => $request->header('Authorization')
        ])->get(env('DOMEN') . '/auth/api/check')->json();

        if (!isset($status['authenticated']) or !$status['authenticated'])
            throw new AuthenticationException();

        return $next($request);
    }
}
