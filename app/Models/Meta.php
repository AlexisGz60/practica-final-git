<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Meta extends Model
{
    protected $table = 'metas';
	protected $fillable = ['nombre','descripcion','plazo','monto','tipo','periodo','status','fecha_inicio'];

	public function tipo(){
		$meta=Meta::find($this->id);
		$tipo='Variable';
		if($meta->tipo== 1){
			$tipo='fijo';
		}
		return $tipo;
	}

	public function stat(){
		$meta=Meta::find($this->id);
		$estatus='Inactiva';
		if ($meta->status==1) {
			$estatus='Activo';
		}
		return $estatus;
	}
}