<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tipos_Ofrenda extends Model
{
    protected $table = 'tipos_ofrendas';
	protected $fillable = ['nombre','descripcion','status'];

	public function statusOfr(){
		$tipo=Tipos_Ofrenda::find($this->id);
		if($tipo->status==true){
			return 'Activo';
		}else{
			return 'Inactivo';
		}
	}
}
