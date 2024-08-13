<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class RemoveUnwantedMetaText
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
            // Proceed with the request
            $response = $next($request);

            // Check if the response content type is HTML
            if ($response->headers->get('content-type') === 'text/html; charset=UTF-8') {
                // Modify the content to remove the unwanted text
                $content = $response->getContent();
                $content = str_replace("- It's Over 9000!", '', $content); // Replace with your unwanted text
                $response->setContent($content);
            }

            return $response;
    }
}
