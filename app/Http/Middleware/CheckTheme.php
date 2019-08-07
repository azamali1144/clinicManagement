<?php

namespace App\Http\Middleware;

use App\Models\Setting;
use Closure;
use Illuminate\Support\Facades\Auth;

class CheckTheme
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

        $theme = Setting::where('key', 'theme')->where('user_id', Auth::user()->id)->get();
        if(isset($theme) && count($theme) > 0 )
            $request->session()->put('version', $theme[0]->value);
        else{

            $request->session()->put('version', 'v1');
            $setting = new Setting();
            $setting->value = "v1";
            $setting->key = "theme";
            $setting->user_id = Auth::user()->id;
            $setting->save();
        }

        return $next($request);
    }
}
