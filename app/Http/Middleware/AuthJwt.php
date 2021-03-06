<?php

namespace App\Http\Middleware;

use Carbon\Carbon;
use Closure;
use Firebase\JWT\JWT;

class AuthJwt
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
        $key = "my_secret_key";

        $jwtToken = $request->bearerToken();

        if(is_null($jwtToken)) {
            return response()->json(['error' => 'Error fetching token'], 500);
        }

        $decoded = JWT::decode($jwtToken, $key, ['HS256']);

        if(!isset($decoded->exp) || $decoded->exp < Carbon::now()->timestamp) {
            return response()->json(['error' => 'Token expired'], 401);
        }

        return $next($request);
    }
}
