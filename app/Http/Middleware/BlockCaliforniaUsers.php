<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Log;

use GeoIP;


class BlockCaliforniaUsers
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $location = GeoIP::getLocation($request->ip());

         Log::info('User Location:', [
        'IP' => $request->ip(),
        'City' => $location->city,
        'State' => $location->state,
        'Country' => $location->country,
        'Latitude' => $location->lat,
        'Longitude' => $location->lon,
    ]);


        if ($location->state == 'CA' && !$this->isRobot($request)) {
            return response('404 Not Found', 404)
                ->header('Content-Type', 'text/plain');
        }

        return $next($request);
    }

    private function isRobot(Request $request)
    {
        $userAgent = $request->header('User-Agent');
        $robots = ['Googlebot', 'Bingbot', 'Slurp', 'DuckDuckBot', 'Baiduspider', 'YandexBot'];

        foreach ($robots as $robot) {
            if (stripos($userAgent, $robot) !== false) {
                return true;
            }
        }

        return false;
    }

}