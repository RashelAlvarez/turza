<?php

namespace App\Http\Middleware;

use Closure;
use App\Pedido;
class CheckOrden
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
     /*  */
     /*    $orden = Pedido::find($id->get("pedidos")); */
    /*     $orden = Pedido::find($request->id);
  
        if ($orden->user_id != auth()->user()->id) {
            return redirect('/pedidos');
        }   */ 

        return $next($request);
 
      
     /*   ($request->user_id != auth()->user()->id){
            return $next($request);
        }
        else{

            return response('No autorizado');
        } */
    }
}

