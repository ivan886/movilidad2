<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Viaje;
use  App\Http\Resources\ViajeResource;
use Storage;
use DateTime;
use DateTimeZone;
use DB;

class ViajeControllerWeb extends Controller
{   
    public function viajesImei(Request $request){
       $viajes = DB::select(' select imei,llave_viaje 
    	                        from viajes
    	                        where imei =:imei  
    	                        group by imei,llave_viaje',array('imei'=>$request->imei));
          return view('viajes.viajes_usuario')->with('viajes', $viajes);
                 
    }
    
    public function mapa(Request $request){
          $viajes=  DB::table('viajes')
                    ->where('imei',$request->imei)
                    ->where('llave_viaje',$request->llave_viaje)
                    ->get();
          return view('viajes.mapa')->with('viajes', $viajes);
                 
    }


    
   public function numViajesImei(){
     $viajes = DB::select(' select count(*)num_viajes ,imei 
                            from  (select  imei,concat(imei,llave_viaje)llave
                                    from viajes group by  
                                     concat(imei,llave_viaje),imei) 
                               viajes group by imei');
         return view('viajes.index')->with('viajes', $viajes);
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


}
