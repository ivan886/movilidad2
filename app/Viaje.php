<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Viaje extends Model
{
     protected $table="viajes";
    public $timestamps=false;
    protected $fillable=[ 'imei',     
						  'latitud'  ,
						  'longitud' ,
						  'medio'     ,
						  'proposito' ,
						  'costo'     ,
						  'tiempo',
						  'estado',
						  'llave_viaje'
						  ];
}
