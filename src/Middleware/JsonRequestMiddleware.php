<?php
/**
 * Created by PhpStorm.
 * User: Fabio
 * Date: 30/06/2020
 * Time: 01:08
 */

namespace Fcristiano\LaravelCommon\Middleware;


use Illuminate\Http\Request;

class JsonRequestMiddleware
{
    public function handle(Request $request, \Closure $next)
    {
        if($request->segment(1) === 'api') {
            $request->headers->set('Accept', 'application/json');
        }

        return $next($request);
    }
}