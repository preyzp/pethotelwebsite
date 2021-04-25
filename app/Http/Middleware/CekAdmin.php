<?php
namespace App\Http\Middleware;
use Closure;
use Illuminate\Support\Facades\Auth;
class CekAdmin
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
//untuk melakukan pengecekkan apakah user memiliki guard sebagai admin
//jika user adalah ('admin'), maka boleh meneruskan request
//jika tidak maka akan di redirect ke halaman awal ('/')
if(Auth::guard('admin')->check() == false)
{
return redirect('/'); //user bukan admin
}
return $next($request);
}
}