<?php

namespace App\Http\Middleware;

use App\Models\Permintaan;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class KaryawanOrPetugas
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {

        // dd(Permintaan::all());


        if (!in_array(Auth::user()->role,['karyawan','petugas'])) {
            abort(403);
        }
        return $next($request);
    }
}
