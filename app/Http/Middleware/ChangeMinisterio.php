<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Contracts\Auth\Guard;
use Session;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class ChangeMinisterio{
    private $auth;

    public function __construct(Guard $auth){
        //$this->middleware('auth');
        $this->auth = $auth;
    }
    
    public function handle($request, Closure $next){
        if(!Auth::check()){
            return redirect('login');
        }
        if (!$this->auth->user()->can_change()){
                return new Response(view('errors.404'));
        }
        return $next($request);
    }
}