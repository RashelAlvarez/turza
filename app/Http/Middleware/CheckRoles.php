<?php

namespace App\Http\Middleware;

use Closure;
use App\User;
class CheckRoles
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
        $roles = array_slice(func_get_args(), 2);  //elimina los dos primeros parametros request y clouse
        /* 
        dd($role); */
    /*   dd($roles); */
/* 
        if(auth()->user()->hasRoles($roles)){
            return $next($request);

        }
  

      return redirect('/'); */
 
      if (auth()->user()->hasRoles($roles)) {
        return $next($request);
        
    }
  
    abort(401, 'Esta acción no esta autorizada.');
    }
}
  