<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Viaje;
use  App\Http\Resources\ViajeResource;
use Storage;
use DateTime;
use DateTimeZone;
use DB;

class ViajeController extends Controller
{
    
    public function info(Request $request){
           Storage::disk('local')->append('log',"imei ".$request->imei ."  tiempo ". $request->tiempo);
    
    }
    
    public function store(Request $request){
        //Storage::disk('local')->append('log',"imei ".$request->imei ."  tiempo ". $request->tiempo);
       $viaje=new Viaje();
       $date = new DateTime("now", new DateTimeZone('America/Bogota') );
        $viaje->imei=$request->imei;
        $viaje->medio=$request->medio;
        $viaje->proposito=$request->proposito;
        $viaje->costo=$request->costo;
        $viaje->latitud=$request->latitud;
        $viaje->longitud=$request->longitud;
        $viaje->tiempo= $date->format('Y-m-d H:i:s');
        $viaje->estado=$request->estado;
        $viaje->llave_viaje=$request->llave_viaje;
        
      //   Storage::disk('local')->append('log',"viaje ".$request->tiempo);
        $viaje->save();
        
      
        return response()->json([
          'error' => 'true',
          'message' => 'se ha agregado un nuevo registro '
        ]);
    
    }


   public function numViajesImei(){
       
       $viajes = DB::table('viajes')
                     ->select(DB::raw('count(*) as num_viajes, imei, llave_viaje'))
                     ->groupBy('imei','llave_viaje')
                     ->get();
       return $viajes;
   }
   
   
   
   public function viajesImeiFecha(Request $request){
   
   if($request->has('imei') and $request->has('llave_viaje') and $request->has('tiempo')){
       return  DB::table('viajes')
                    ->whereRaw('DATE(tiempo)=? ', [$request->tiempo])
                    ->where('imei',$request->imei)
                    ->where('llave_viaje',$request->llave_viaje)
                    ->get();
                    
      }
      if($request->has('imei') ){
       return  DB::table('viajes')
                    ->whereRaw('DATE(tiempo)=? ', [$request->tiempo])
                    ->where('imei',$request->imei)
                    ->where('llave_viaje',$request->llave_viaje)
                    ->get();
                    
       }
        return  DB::table('viajes')
                    ->whereRaw('DATE(tiempo)=? ', [$request->tiempo])
                    ->get();

        //
        
      
   }
   
   
    public function index(){
    	 return ViajeResource::collection(Viaje::all());
                 
    }

    public function deleteAll(){
         Viaje::truncate();
                 
    }
}
