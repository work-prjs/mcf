<?php

namespace App\Http\Middleware;

use Closure;
use Session;
use App;
use Config;


class LanguageSwitcher
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
        // App::setLocale(session('locale'));

        if (Session::has('locale'))
         {
            App::setLocale(session('locale'));
        } else {

            $locale = substr($request->server('HTTP_ACCEPT_LANGUAGE'), 0, 2);

            if ($locale != 'ru') {
                $locale = 'en';
            }
            Session::put('locale',$locale);
            App::setLocale(session('locale'));
        }

        if (!empty($request->all()['_lang'])) {
            if ($request->all()['_lang'] != 'ru') {
                $locale = 'en';
            } else {
                $locale = 'ru';
            }
            Session::put('locale',$locale);
            App::setLocale(session('locale'));
            // dd($locale);
        } 
        


        return $next($request);
    }    
}
