<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StatusBienes extends Model
{
    protected $table = 'status_bienes';

    protected $fillable = [
    	'name'
    ];

    public function bienes(){
    	return $this->hasMany('App\Producto');
    }
}
