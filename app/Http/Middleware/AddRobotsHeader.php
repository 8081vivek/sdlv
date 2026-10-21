<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AddRobotsHeader
{
    private const INDEXABLE_PATHS = [
        '',
        'about',
        'facilities',
        'gallery',
        'robots.txt',
        'sitemap.xml',
    ];

    public function handle(Request $request, Closure $next): Response
    {
        $response = $next($request);

        if (
            in_array($request->method(), ['GET', 'HEAD'], true)
            && ! in_array(trim($request->path(), '/'), self::INDEXABLE_PATHS, true)
        ) {
            $response->headers->set('X-Robots-Tag', 'noindex, nofollow');
        }

        return $response;
    }
}
