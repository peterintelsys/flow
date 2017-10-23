<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use App\Client;

class IsClient
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
        $user = Auth::user();
        $client = Client::where('id', $user->client_id)->first();

    
        if($client->active){
        return $next($request);
        } else {

        abort(401, 'Ditt konto har upphört');
        }
    }
}
