<?php

namespace App\Http\Controllers;

use App\Models\Hcita;
use App\Models\TipoHorario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use League\CommonMark\Extension\CommonMark\Renderer\Block\ThematicBreakRenderer;

use function PHPUnit\Framework\isEmpty;
use function PHPUnit\Framework\isNull;

class TipoHorarioController extends Controller
{
    public function index(){
       //$thor = TipoHorario::select('id', 'intervalo','descripcion');
       $thor = TipoHorario::all(); // Lista de intervalos en el sistema
       $estado = array();
       foreach ($thor as $th){
            $ehor = Hcita::select('thor_id')
                ->where( 'thor_id','=', $th->id )
                ->first();
       }
       return view('admin.thorario.index', compact('thor'));
    }

    public function create(){
        return view('admin.thorario.create');
    }

    public function store(Request $request){
        $intv = $request->intv;
        $thorar = TipoHorario::select('id')
            ->where('intervalo', '=', $intv)->get();

        if ( $thorar->isEmpty()) {
            //return view('prueba');
            $thid = TipoHorario::insertGetId(
                [ 'intervalo' => $intv ] //'descripcion' => $intdesc ]
            );
            $horas = DB::select('call CrearHoraCita(?,?)', array($intv, $thid));
            Return redirect()->route('tiphora.index');
        } else {
            return view('prueba2');
        }
    }
}
