<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Models\User;

class IsApiUser
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $token = $request->header('Authorization');

        if ($token) {
            // Extract token from the header, assuming it's in the format "Bearer {token}"
            $token = str_replace('Bearer ', '', $token);

            $user = User::where('access_token', $token)->first();

            if ($user !== null) {
                return $next($request);
            } else {
                return response()->json('Invalid access token', 401);
            }
        } else {
            return response()->json('Authorization header is missing', 401);
        }
    }
}
