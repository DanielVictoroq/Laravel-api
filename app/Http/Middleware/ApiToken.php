<?php

namespace App\Http\Middleware;
use Illuminate\Contracts\Auth\Factory as AuthFactory;
use Closure;

class ApiToken
{
 
    private $auth;

    public function __construct(AuthFactory $auth)
    {
        $this->auth = $auth;
    }

    public function handle($request, Closure $next)
    {

        if ($request->getUser() != config('api.username') || $request->getPassword() != config('api.password')) {
            return response()->json('Unauthorized', 401);
        } 
        
        return $next($request);
    }
}
