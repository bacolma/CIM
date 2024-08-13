<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Auth;
use Dompdf\Dompdf;
use Dompdf\Options;
use App\Models\Historia;
use App\Models\Paciente;
use Carbon\Carbon;

class reportes extends Controller
{
    public function atenc(Request $request) {
        //$fec = '2022-11-21';
        //$fec = Carbon::today()->format('Y-m-d');
        if (empty($request->fecha)) {
            $fec = Carbon::today()->format('Y-m-d');
        } else {
            $fec = $request->fecha;
        }

        $fecDia = Carbon::createFromFormat('Y-m-d', $fec)->format('d/m/Y');
        //$fecDia = $fec;
        $pacs = DB::table('pacientes')
            ->select('pacientes.id','pacientes.nombres','pacientes.apellidos',
            'historias.id as hid','historias.fecha','historias.tipcon')
            ->join('historias', 'pacientes.id','=','historias.pacid')
            ->where('historias.fecha','=',$fec)->get();
        return view('report.consDiar', compact('pacs','fecDia'));
        //return view('prueba2');
    }

    public function prtAtnc(Request $request) {

        $fecDia = $request->fecDia;
        $fecCon = Carbon::createFromFormat('d/m/Y',$fecDia)->format('Y-m-d');

        //return view('prueba2');
        $pacs = DB::table('pacientes')
            ->select('pacientes.id','pacientes.nombres','pacientes.apellidos',
            'historias.fecha','historias.tipcon')
            //->where('id','=','6607');//,'pacid','motcon')
            ->join('historias', 'pacientes.id','=','historias.pacid')
            ->where('historias.fecha','=', $fecCon)->get();
        $pdf = Pdf::loadView('report.PrtConsDiar', compact('pacs','fecDia'));
        return $pdf->stream('consDiar.pdf');
        //return view('reporte.consDiar');
    }

    public function genInfMed(Request $request) {
        $dr = Auth::user();
        $detCons = Historia::find($request->detCons);
        $dpac = Paciente::find($request->dpac);
        $eda = Carbon::createFromDate($dpac->fecnac)->age;
        //$fecDia = $detCons->fecha;
        //$fecCon = Carbon::createFromFormat('d/m/Y', $fecDia)->format('Y-m-d');
        $opt = new Options();
        $opt->set('defaultFont','Helvetica');
        $pdf = new Dompdf($opt);
        $pdf = Pdf::loadView('report.InfMed', ['dr'=>$dr,'detCons'=>$detCons, 'dpac'=>$dpac, 'eda'=>$eda]);

        return $pdf->stream('InfMed.pdf');
        //return view("report.InfMed", compact('dr','detCons','dpac','eda'));
    }
}
