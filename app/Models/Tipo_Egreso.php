<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tipo_Egreso extends Model
{
    protected $table = 'tipo_egresos';
	protected $fillable = ['nombre','descripcion','status'];

	public function statusEst(){
		$tipo=Tipo_Egreso::find($this->id);
		if($tipo->status==true){
			return 'Activo';
		}else{
			return 'Inactivo';
		}
	}

}