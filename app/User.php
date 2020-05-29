<?php

namespace App;

use Laravel\Passport\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
//use App\Models\Dependencia;
//use App\Jobs\SendPassReset;

class User extends Authenticatable{
   
    protected $fillable = [
        'usuario',
        'password',
        'activo',
        'perfil_id',
        'ministerio_id',
        'nombre',
        'acronimo',
        'area',
        'cargo',
        'email',
        'celular',
        'verified',
        'token'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function perfil(){
        return $this->belongsTo('App\Models\Perfil', 'perfil_id');
    }

    public function min(){
        return Ministerio::where('id', \Session::get('ministerio_id'))->first();
    }

    public function ministerio(){
        return $this->belongsTo('App\Models\ministerio', 'ministerio_id');
    }

    //Siempre dependencia_id = 19 
    public function is_administrador(){
        if ($this->perfil_id == 1) {
            return true;
        }else{
            return false;
        }
    }
    //Si es perfil de movil
    public function is_movil(){
        if ($this->perfil_id == 4) {
            return true;
        }else{
            return false;
        }
    }

    public function can_change(){
        if ($this->is_administrador() ||
            $this->is_movil()
            //$this->is_movil()
        ) {
            return true;
    }else{
        return false;
    }
}
}