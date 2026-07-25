<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use App\Models\WebInfo;

class DefaultViewData
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Cache web_title 60 menit — tidak query DB setiap request
        $webTitle = Cache::remember('web_title', 3600, function () {
            $info = WebInfo::where("name", "web_title")->first();
            return $info ? $info->value : 'John Bag Shop';
        });

        View::share('web_title', $webTitle);
        View::share('user_info', Auth::user());
        return $next($request);
    }
}
