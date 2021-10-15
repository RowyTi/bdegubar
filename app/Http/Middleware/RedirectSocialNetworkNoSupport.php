<?php

namespace App\Http\Middleware;

use App\Models\SocialNetwork;
use Closure;
use Illuminate\Http\Request;

class RedirectSocialNetworkNoSupport
{
    /**
     * Handle an incoming request.
     *
     * @param Request $request
     * @param Closure $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if ( collect(SocialNetwork::$allowed)->contains($request->route('socialNetwork')))
        {
            return $next($request);
        }

        return response()->json(['error' => "No es posible autenticarse con {$request->route('socialNetwork')}"]);
    }
}
