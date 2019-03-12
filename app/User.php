<?php

namespace Almacen;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'users';

    protected $primaryKey='iduser';

    protected $fillable = ['name', 'email', 'password','puesto','idresidencia'];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    /*protected $hidden = [
        'password', 'remember_token',
    ];*/

    /*public function residencias()
    {
     return $this->belongsToMany(Residencia::class);
    }*/

    public function admin()
    {
        return $this->puesto === 'Administrador';
    }

    public function delegado()
    {
        return $this->puesto === 'Delegado_administrativo';
    }

    public function campamento()
    {
        return $this->puesto === 'Delegado_obra';
    }

    public function auxiliar()
    {
        return $this->puesto === 'Auxiliar_administrativo';
    }

      public function residencia(){
        return $this->belongsTo(Residencia::class,'idresidencia');
    }

}
