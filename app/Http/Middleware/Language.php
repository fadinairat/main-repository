<?php 
namespace App\Http\Middleware;

use Closure;
use Illuminate\Routing\Redirector;
use Illuminate\Http\Request;
use Illuminate\Foundation\Application;
use Illuminate\Contracts\Routing\Middleware;


class Language {

    public function __construct(Application $app, Redirector $redirector, Request $request) {
        $this->app = $app;
        $this->redirector = $redirector;
        $this->request = $request;
    }

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        // Make sure current locale exists.        
        $locale = $request->segment(1);    
        if($locale=="Control"){

        }    
        else if(! array_key_exists($locale, $this->app->config->get('app.locales'))) {
            $segments = $request->segments();   
            array_unshift($segments, $this->app->config->get('app.fallback_locale'));
            //$segments[0] = $this->app->config->get('app.fallback_locale');    
            //print_r($segments);                    
            return $this->redirector->to(implode('/', $segments));
        }
        else{//get the default locale

        }

        $this->app->setLocale($locale);

        \Session::set("locale",$locale);
        \Session::set("prefix",\Config::get("app.locales_prefix.".$locale));
        \Session::set("locale_id",\Config::get("app.locales_ids.".$locale));
        //echo "Lang:".\Session::get("locale_id")."<br>";        
        return $next($request);
    }

}