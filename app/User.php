<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;


class User extends Authenticatable
{
    use Notifiable;
  

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    
    public $table = 'users';
    protected $fillable = [
        'role_id','nombre', 'apellido' ,'email', 'password', 'razon_social', 'rif', 'telefono', 'direccion', 'vendedor_id', 'file',
    ];
 
   
    
    
    
   

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function setPasswordAttribute($password){
        $this->attributes['password'] = bcrypt($password);
    }

   

    public function role(){
        return $this->belongsTo(Role::class);

    }


    public function vendedor(){
        return $this->belongsTo(Vendedor::class);

    }
    public function pedido(){
        return $this->belongsTo(Pedido::class);

    }

  
    
     public function hasRoles(array $roles){
        foreach ($roles as $role){
             if ($this->role->nombre === $role){
             
                return true;
            }
          
        }
      
        return false;
    } 






    /*metodo para roles*/ 

   /*  public function authorizeRoles($roles) {
        if ($this->hasAnyRole($roles)) {
            return true;
        }
        abort(401, 'Esta acción no está autorizada.');
    }
    
    public function hasAnyRole($roles) {
        if (is_array($roles)) {
            foreach ($roles as $role) {
                if ($this->hasRole($role)) {
                    return true;
                }
            }
        } else {
            if ($this->hasRole($roles)) {
                return true;
            }
        }
        return false;
    }
    
    public function hasRole($role) {
        if ($this->roles()->where('name', $role)->first()) {
            return true;
        }
        return false;
    } */

}
