<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Carbon;
//use Illuminate\Support\Facades\Redirect;
use App\Models\User;
use App\Models\Agenda;
use App\Models\Hcita;
use App\Models\fecha;
use App\Models\Paciente;

use function PHPSTORM_META\type;
use function PHPUnit\Framework\isEmpty;
use function PHPUnit\Framework\isNull;

class AgendaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $user = Auth::user();
        $userid = $user->id;
        $nombre = $user->name;
        if (isset($request->fecha)){
            $fech = Carbon::createFromFormat('Y-m-d', $request->fecha)->format('d/m/Y');
            $fecha = Carbon::createFromFormat('Y-m-d', $request->fecha)->format('Y-m-d');
        } else {
            $fech = Carbon::now()->format('d/m/Y');
            $fecha = Carbon::now()->format('Y-m-d');
        }

        $fecExt = fecha::where('fecha','=',$fecha)->get();
        $hcitas=hcita::all();

        if (!isset($fecExt[0])) {
            $mensj = 'No Existe la Fecha Consultada en la Agenda.';
            $fecExt->id = 0;
        } else {

        $agendas=agenda::select('agendas.id','agendas.datopac','agendas.hcitaid','agendas.fechaid')
        ->join('hcitas','hcitas.id','=','agendas.hcitaid')
        ->join('fechas','fechas.id','=','agendas.fechaid')
        ->where('userid','=', $userid)
        ->where('fechas.id','=', $fecExt[0]->id)
        ->get();
       return view('citas.index',
       compact('agendas','userid', 'hcitas', 'fech', 'nombre','fecExt'));
    }
        return view('citas.index',
        compact('fecha', 'userid', 'hcitas', 'fech', 'nombre','fecExt'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
        {
            $pacId = $request->pacId;
            $fecha = $request->fecha;
            $doct = Auth::user();
            $did = $doct->id;
            $dnom = $doct->name;
            $datPac = Paciente::select('nombres','apellidos','cedula','celular')
                ->where('id', '=', $pacId)->get();
            $datopac = $datPac[0]->nombres . " " . $datPac[0]->apellidos . " Cedula: " . $datPac[0]->cedula . " Celular: " . $datPac[0]->celular;
            $fech = Carbon::createFromFormat('Y-m-d', $fecha)->format('d/m/Y');
            $fe = fecha::select('id','fecha')->where('fecha','=',$fecha)->get();
            $hcitas = Hcita::all();
            if ($fe->isEmpty()){
                $msg = "No Existe La Fecha";
                $fe = new fecha;
                $fe->fecha = $fecha;
                $fe->save();
                $feId = $fe->id;
                $fe = fecha::select('id','fecha')->where('id','=',$feId)->get();
            } else {
                $feId = $fe[0]->id;
            }
            $ruta = route('citas.create');
            $agendas = Agenda::select('id','datopac','userid','fechaid','hcitaid')
                ->where('userid','=', $did)
                ->where('fechaid','=', $feId)->get();
            //return view('prueba', compact('did','dnom','pacId','fecha','fe','hcitas','agendas','datopac'));
            return view('citas.selHcita', compact('ruta','did','dnom','pacId','fecha','fech','fe','hcitas','agendas','datopac'));
        }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $fechaid = $request->fechaid;
        $user = Auth::user();
        $userid = $user->id;
        $dnom = $user ->name;
        $hcitaid = $request->hcitaid;
        $datopac = $request->datopac;
        $fec = fecha::find($fechaid);
        $fecha = $fec->fecha;
        $newAgd = Agenda::insert(['datopac' => $datopac,'userid'=> $userid,
            'fechaid' => $fechaid, 'hcitaid' => $hcitaid]);
       //return view('prueba', compact('fechaid','datopac','userid','hcitaid', 'fecha'));
       return redirect()->route('citas.list', ['fecha'=>$fecha]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function list(Request $request)
    {
        $fec = $request->fecha;

        if (empty($fec)) {
            $fech = Carbon::now()->format('d/m/Y');
            $fecha = Carbon::now()->format('Y-m-d');
        } else {
            $fech = date('d/m/Y', strtotime($fec));
            $fecha = date('Y-m-d', strtotime($fec));
        }
        $user=Auth::user();
        $userid=$user->id;
        $nombre=$user->name;
        $hcitas = hcita::all();
        $agendas=agenda::select('agendas.id','datopac','hcitaid','fechaid')
        ->join('hcitas','hcitas.id','=','hcitaid')
        ->join('fechas','fechas.id','=','fechaid')
        ->where('userid','=', $userid)
        ->where('fechas.fecha','=', $fecha)
        ->get();
        return view('citas.hcita',
        compact('agendas', 'fecha', 'userid', 'hcitas', 'fech', 'nombre')); //, 'pacId'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        $user = Auth::user();
        $doct = $user->id;
        $nombre = $user->name;
        $agenda = $request->cita;
        $fecha = $request->fecId;
        $datAgd = Agenda::select('agendas.id','agendas.datopac','fechas.fecha','hcitas.hora')
            ->join('fechas','fechas.id','=','agendas.fechaid')
            ->join('hcitas','hcitas.id','=','agendas.hcitaid')
            ->where('agendas.id','=',$request->cita)->get();
         return view('citas.edit', compact('doct','nombre','datAgd'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($id, Request $request)
    {
        $updStat = Agenda::where('id', $id)
            ->update(['datopac'=> $request->datPac]);

        $fecha = $request->fecha;
        //return view('prueba', compact('fecha'));
        return redirect()->route('citas.index', compact('fecha'));
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return view('prueba');
    }
}
