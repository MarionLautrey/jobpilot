<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RequestId
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $id = $request->header('X-Request-Id') ?? (string) Str::ulid();

        Log::withContext(['request_id' => $id]);

        $response = $next($request);
        return $response->header('X-Request-Id', $id);
    }
}
