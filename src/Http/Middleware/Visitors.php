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
        $unique = Unique::where(Unique::IP, $ip)->first();

        if ($unique == null) {
            $unique = Unique::create([
                Unique::IP => $ip,
                Unique::ACTIVE => true
            ]);
        }

        if (!$unique->active) {
            return abort('403');
        }

        $unique->touch();
        if (config('visitors.logActions')) {
            Visitor::create([
                Visitor::UNIQUE_ID => $unique->id,
                Visitor::HEADER => $request->header('User-Agent'),
                Visitor::ROUTE => $request->fullUrl(),
                Visitor::PATH => $request->path(),
                Visitor::METHOD => $request->method()
            ]);
        }

        return $next($request);
    }
}
