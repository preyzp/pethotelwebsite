<?php

namespace App\Http\Middleware;

use Illuminate\Support\Facades\Auth;


use Closure;

class CekAdmin1
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        //untuk melakukan pengecekkan apakah user memiliki guard sebagai peserta
        //jika user adalah ('peserta'), maka boleh meneruskan request
        //jika tidak maka akan di redirect ke halaman awal ('/')         
        if(Auth::guard('admin1')->check() == false)
        {
        return redirect('/'); //belum login
        }

            return $next($request);
        }
}
