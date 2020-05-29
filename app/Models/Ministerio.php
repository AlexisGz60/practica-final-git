<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ministerio extends Model
{
    protected $table = 'ministerios';
	protected $fillable = ['nombre','descripcion','año_id', 'status'];

	public function año(){
		return $this->belongsTo('App\Models\Año', 'año_id');
	}
}
