<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pastores extends Model
{
    protected $table = 'pastores';
	protected $fillable = ['nombre','tel','iglesia_id'];

	public function iglesia(){
		return $this->belongsTo('App\Models\Iglesia', 'iglesia_id');
	}
}
