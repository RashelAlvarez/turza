<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    //

    public $table = 'clientes';
    protected $fillable = [
       'user_id', 'nombre', 'apellido', 'razon_social', 'rif', 'telefono', 'direccion', 'vendedor_id', 'file', 'email',
    ];


    public function role(){
        return $this->belongsTo(Role::class);

    }
        
    public function hasRoles(array $roles){
        foreach ($roles as $role){
             if ($this->role->nombre === $role){
             
                return true;
            }
          
        }
      
        return false;
    }

    public function vendedor(){
        return $this->belongsTo(Vendedor::class);

    }

    public function pedido(){
        return $this->hasMany(Pedido::class);

    }

    public function user(){
        return $this->hasOne(User::class);

    }

    public function producto_precios(){
        return $this->hasMany(Precio_Unitario::class);
    }
    

}
