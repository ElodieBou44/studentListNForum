<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class Localization
{
    public function handle(Request $request, Closure $next)
    {

        if(session()->has('locale') && session()->get('locale')!='en'){
            App::setLocale(session()->get('locale'));
            session()->put('localeDB', '_'.session()->get('locale'));
        }else{
            session()->put('localeDB', '');
        }
        return $next($request);
    }

}

    // /**
    //  * Handle an incoming request.
    //  *
    //  * @param  \Illuminate\Http\Request  $request
    //  * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
    //  * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
    //  */
    // public function handle(Request $request, Closure $next)
    // {
    //     // Vérification de la langue enregistrée dans la session, s'il y en a une -> modification de la variable "locale" du fichier config/app.php. 
    //     if(session()->has('locale')){
    //         App::setLocale(session()->get('locale'));
    //         dd("Middleware handle was called!");
    //     }

    //     return $next($request);
    // }
