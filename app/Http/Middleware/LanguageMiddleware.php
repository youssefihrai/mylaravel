<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class LanguageMiddleware
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
       $language=null;
       if((Auth::check())&&(Session::has('language')) ){
           $language=$request->user()->language;
    Session::put('language', $language);
        }
       if($request->has('language')){ 
        $language=$request->get('language');
        Session::put('language', $language);
       }
       if($language==null){
           $language=config('app.fallback_locale');
       }
       App::setLocale($language);    
        return $next($request);
    }
}
