<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\User;
use App\Models\Favourite;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class FavOwner
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {


        try {
            $favouriteId = $request->route('favourite');
            $auth = auth()->id();
            $fav = Favourite::where('id', $favouriteId)
                ->where('user_id', $auth)->exists();


            if ($fav == 0)
                return response()->json([
                    'message' => 'You are not authorized to perform this action'
                ], Response::HTTP_UNAUTHORIZED);
        } catch (\Throwable $th) {
        }
        return $next($request);
    }
}
