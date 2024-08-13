<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Historia;
use App\Models\Paciente;
use Illuminate\Support\Facades\Auth;
use Barryvdh\DomPDF\Facade\Pdf;

class HistoriaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $id)
    {
        //$pacid = $id->paciente;
        $dr = Auth::user();
        $dpac = Paciente::find($id->paciente); // Datos Paciente
        //$pacid = 6610;
        //$histP = Historia::where('idpac','=', $pacid)->get();
        $hist = Historia::where('pacid','=', $id->paciente)
            ->orderBy('Fecha','desc')->get();
            //->orderByRaw('YEAR(fecha), MONTH(fecha), DAY(fecha) DESC')->get();

        return view('historia.index', compact('dpac','hist','dr'));
        //return view('prueba', compact('pacient'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $dr = Auth::user();
        $dpac = Paciente::find($request->pacid);
        return view('historia.create', compact('dpac','dr'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //$dr = Auth::user();
        $id=Historia::insertGetId(
            [
                'drid'=>$request->drid, 'pacid'=>$request->pacid, 'fecha'=>$request->fecha,
                'tipcon'=>$request->tcons, 'motcon'=>$request->motcon, 'evolucion'=>$request->evolucion,
                'texenf'=>$request->texenf, 'vitpes'=>$request->vitpes, 'vittal'=>$request->vittal,
                'vitten'=>$request->vitten, 'vitpul'=>$request->vitpul, 'vitres'=>$request->vitres,
                'otrobs'=>$request->otrobs, 'plater'=>$request->plater, 'exalab'=>$request->exalab,
                'exaesp'=>$request->exaesp, 'exarad'=>$request->exarad, 'exapre'=>$request->exapre,
                'resexalab'=>$request->resexalab, 'resexarad'=>$request->resexarad, 'resexaesp'=>$request->resexaesp,
                'resexapre'=>$request->resexapre, 'tratamiento'=>$request->tratamiento, 'indicaciones'=>$request->indicaciones,
                'condinf'=>$request->condinf, 'fungenobs'=>$request->genobs, 'funhabtab'=>$request->tabaco,
                'funhabcaf1'=>$request->cafe1, 'funhabcaf2'=>$request->cafe2, 'funhabmed'=>$request->medica,
                'funhabdro'=>$request->droga, 'funhabing'=>$request->inghab, 'funhabsue'=>$request->sueno,
                'funhabotr'=>$request->otrhab, 'funhabalc1'=>$request->alc1,'funhabalc2'=>$request->alc2
            ]
        );
        
        $updAntc = Paciente::where('id', $request->pacid)
            ->update(['antecedentes' => $request->antecedentes]);

        return redirect()->route('historia.index', ['paciente'=>$request->pacid]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    //public function show(Request $request)
    {
        $dr = Auth::user();
        $pacid = Historia::select('pacid')
            ->where('id','=',$id)->get();
        foreach ($pacid as $paci) {
            $pac = $paci->pacid;
        }
        $detCons = Historia::find($id);
        $dpac = Paciente::find($pac);
        return view('historia.show',compact('detCons','dpac','dr'));
        //return view('prueba2', compact('detCons'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $dr = Auth::user();
        $detCons = Historia::find($id);
        $dpac = Paciente::find($detCons->pacid);

        //return view('prueba2', compact('detCons'));
        return view('historia.edit', compact('detCons','dpac','dr'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $historium = $id;
        $updDat = Historia::where('id', $id)
            ->update([
                'drid'=>$request->drid, 'pacid'=>$request->pacid, 'fecha'=>$request->fecha,
                'tipcon'=>$request->tipcon, 'motcon'=>$request->motcon, 'evolucion'=>$request->evolucion,
                'texenf'=>$request->texenf, 'vitpes'=>$request->vitpes, 'vittal'=>$request->vittal,
                'vitten'=>$request->vitten, 'vitpul'=>$request->vitpul, 'vitres'=>$request->vitres,
                'otrobs'=>$request->otrobs, 'plater'=>$request->plater, 'exalab'=>$request->exalab,
                'exaesp'=>$request->exaesp, 'exarad'=>$request->exarad, 'exapre'=>$request->exapre,
                'resexalab'=>$request->resexalab, 'resexarad'=>$request->resexarad, 'resexaesp'=>$request->resexaesp,
                'resexapre'=>$request->resexapre, 'tratamiento'=>$request->tratamiento, 'indicaciones'=>$request->indicaciones,
                'condinf'=>$request->condinf, 'fungenobs'=>$request->genobs, 'funhabtab'=>$request->tabaco,
                'funhabcaf1'=>$request->cafe1, 'funhabcaf2'=>$request->cafe2, 'funhabmed'=>$request->medica,
                'funhabdro'=>$request->droga, 'funhabing'=>$request->inghab, 'funhabsue'=>$request->sueno,
                'funhabotr'=>$request->otrhab, 'funhabalc1'=>$request->alc1,'funhabalc2'=>$request->alc2
            ])
        ;
        $updAntc = Paciente::where('id', $request->pacid)
            ->update(['antecedentes' => $request->antecedentes]);

       //return view('prueba2', compact('request','id'));
       return redirect()->route('historia.show', compact('historium'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function reporte()
    {
        $pdf = Pdf::loadView('reporte');
        return $pdf->stream('reporte.pdf');
        return view('reporte');
    }
}
