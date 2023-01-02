<?php

namespace App\Http\Middleware;

use Closure;
use App\UserConsts;
use Illuminate\Http\Request;

use App\Models\Lecture;

class CanDeleteLecture
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
        $lecture = Lecture::find($request->route()->parameter('id'));

        if (auth('sanctum')->user()->type !== UserConsts::ADMIN && auth('sanctum')->id() !== $lecture->user_id) {
            abort(403);
        }

        return $next($request);
    }
}
