<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Contracts\Auth\Guard;

class Movil
{
    private $auth;

    public function __construct(Guard $auth){
        $this->auth = $auth;
    }
    
    public function handle($request, Closure $next){
        if ($this->auth->user()->is_movil()){
                return $next($request);          
        }else{
            return new Response(view('errors.404'));
        }
        
    }
}