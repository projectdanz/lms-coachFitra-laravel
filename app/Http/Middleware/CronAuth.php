<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CronAuth
{
    public function handle(Request $request, Closure $next)
    {
        $cronSecret = config('app.cron_secret');
        
        if ($request->header('X-Cron-Secret') !== $cronSecret && 
            $request->query('secret') !== $cronSecret) {
            abort(403, 'Unauthorized cron access');
        }

        return $next($request);
    }
}