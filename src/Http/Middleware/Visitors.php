<?php

namespace gadixsystem\visitors\Http\Middleware;

use gadixsystem\visitors\Models\Visitor;
use gadixsystem\visitors\Models\Unique;
use Closure;

class Visitors
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $ip = $request->getClientIp();
        $unique = Unique::where('ip', $ip)->first();

        if ($unique == null) {
            $unique = Unique::create([
                'ip' => $ip,
                'active' => true
            ]);
        }

        if (!$unique->active) {
            return abort('403');
        }

        $unique->touch();

        Visitor::create([
            "unique_id" => $unique->id,
            "header" => $request->header('User-Agent') ?? 'Headerless',
            "route" => $request->fullUrl(),
            "path" => $request->path(),
            "method" => $request->method()
        ]);

        return $next($request);
    }
}
