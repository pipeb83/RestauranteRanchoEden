<?php

/*
 * Taken from
 * https://github.com/laravel/framework/blob/5.2/src/Illuminate/Auth/Console/stubs/make/controllers/ReporteControlador.stub
 */
namespace App\Http\Controllers;

use App\IndicadorAire;
use App\tareaAire;
use Illuminate\Http\Request;
use App\Indicador;
use App\IndicadorAgua;
use App\Reporte;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB ;
use Auth;
use App\tarea;
use App\tareaAgua;
use Excel;
use Carbon\Carbon;

class ReporteAireControlador extends Controller
{
     /**
     * Crea una nueva instancia de controlador.
     *
     * @return void
     */
    public function __construct(){
       
    }
     /**
     * FunciÃ³n para editar las tareas en la tabla.
     * @param $id Id de la tarea
     * @return  view tareas.edit retorna la vista para editar las tareas.
     */
    public function edit($id){

        $indicadorAire =IndicadorAire::findOrFail($id);
        $tareaAire = tareaAire::paginate();
        return view('reporte.editAire',compact('indicadorAire','tareaAire'));
        
    }
    public function index(){

        $tareas=tareaAire::select('descripcion','estado')->get();
        Excel::create('Reporte ', function($excel) use($tareas) {

            $excel->sheet('Indicadores', function($sheet) use ($tareas) {

                $sheet->fromArray($tareas);

            });


        })->export('xls');
        
    }
}
