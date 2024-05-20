<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SetLocale
{
    /**
     * Handle an incoming request.
     *
     * @param Closure(Request): (Response) $next
     */
    public function handle(Request $request, Closure $next)
    {
        $locale = $request->query('locale');
        if (!$locale) {
            $locale = $request->session()->get('locale', config('app.locale'));
        } else {
            $request->session()->put('locale', $locale);
        }
        app()->setLocale($locale);
        return $next($request);
    }
}
