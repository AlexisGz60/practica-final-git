<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Iglesias extends Model
{
    protected $table = 'iglesias';
	protected $fillable = ['nombre','domicilio','telefono'];

}
