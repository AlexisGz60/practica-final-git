<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Tipos_Ofrenda;
use App\Models\Tipo_Egreso;
use App\Models\Meta;



class CatalogoController extends Controller
{
	public function __construct() {
		$this->middleware('auth');
	}
    //******************************Ofrendas*************************//
    public function indexTiposOfrendas(){
    	$tipos=Tipos_Ofrenda::all();
        $count=0;
    	return view('catalogos.ofrendas.tipos_ofrendas')->with('tipos', $tipos)->with('count', $count);
    }

    public function createTiposOfrendas(Request $request){
    	$tipo = new Tipos_Ofrenda;
    	$tipo->nombre=$request->nombre;
    	$tipo->descripcion=$request->descripcion;
        if ($request->status==1) {
            $tipo->status=true;
        }
    	if($tipo->save()){
    		\Session::flash('message_danger', '¡Ya no queda mas recurso los datos no fueron guardados!');
            return redirect()->back();
    	}
    }

    public function updateTiposOfrendas(Request $request){
        $tipo=Tipos_Ofrenda::find($request->tipoOfrenda_id);
        $tipo->nombre=$request->nombre;
        $tipo->descripcion=$request->descripcion;
        if ($request->status==1) {
            $tipo->status=true;
        }else{
            $tipo->status=false;
        }
        if($tipo->save()){
            \Session::flash('message_danger', '¡Ya no queda mas recurso los datos no fueron guardados!');
            return redirect()->back();
        }
    }

    public function destroyTiposOfrendas($id){
        $tipo = Tipos_Ofrenda::find($id);
        if ($tipo->delete()) {
            \Session::flash('message_danger', '¡Ya no queda mas recurso los datos no fueron guardados!');
            return redirect()->back();
        }else{
            \Session::flash('message_danger', '¡Ya no queda mas recurso los datos no fueron guardados!');
            return redirect()->back();
        }
    }
    //******************************Tipo Egresos*************************//
    public function indexEgresos(){
        $tipos=Tipo_Egreso::all();
        $count=0;
        return view('catalogos.egresos.tipos_egresos')->with('tipos', $tipos)->with('count', $count);
    }

    public function createEgresos(Request $request){
        $tipo = new Tipo_Egreso;
        $tipo->nombre=$request->nombre;
        $tipo->descripcion=$request->descripcion;
        if ($request->status==1) {
            $tipo->status=true;
        }
        if($tipo->save()){
            \Session::flash('message_danger', '¡Ya no queda mas recurso los datos no fueron guardados!');
            return redirect()->back();
        }
    }

    public function updateEgresos(Request $request){

    }

    public function destroyEgresos($id){

    }
    //******************************Iglesias*************************//
    public function indexIglesias(){

    }

    public function createIglesias(Request $request){

    }

    public function updateIglesias(Request $request){

    }

    public function destroyIglesias($id){

    }
    //******************************Pastores*************************//
    public function indexPastores(){

    }

    public function createPastores(Request $request){

    }

    public function updatePastores(Request $request){

    }

    public function destroyPastores($id){

    }

    //******************************Metas*************************//
    public function indexMetas(){
        $metas=Meta::all();
        $count=0;
        return view('catalogos.metas.metasIndex')->with('metas', $metas)->with('count', $count);
    }

    public function createMetas(Request $request){
       // dd($request);
        $meta=new Meta;
        $meta->nombre=$request->nombre;
        $meta->descripcion=$request->descripcion;
        $meta->status=$request->status;
        $meta->tipo = $request->tipo;
        $meta->monto = $request->monto;
        if($request->tipo == 1){
            $meta->fecha_inicio = $request->fecha_inicio;
            $meta->periodo = $request->periodo;
        }else{
            $meta->plazo = $request->plazo;
            $meta->fecha_inicio = $request->fecha_inicio;
        }
        if ($meta->save()) {
            \Session::flash('message_danger', '¡Se guardo la meta correctamente!');
            return redirect()->back();
        }
    }

    public function updateMetas(Request $request){

    }

    public function destroyMetas($id){

    }

}
