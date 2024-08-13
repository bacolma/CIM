<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Paciente;
use App\Models\Nacion;
use Illuminate\Support\Str;

class PacienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
       if($request->has('cedula') && !empty($request->input('cedula'))) {
        $ced = $request->cedula;
        $pacient = Paciente::select('id','nombres','apellidos','cedula','celular','correo')
            ->where('cedula','like', '%'.$ced.'%')->get();
            if ($pacient->isNotEmpty()){
                if (isset($request->exist)){
                    $mnsj = "Cedula Existente";
                    return view('paciente.index', compact('pacient','mnsj'));
                } else {
                return view('paciente.index', compact('pacient'));
                }
            } else {
                $noExist = "No Existe un Paciente con la Cedula Consultada";
                return view("paciente.ConsPac", compact('noExist'));
            }
        } else {
          if($request->has('nombre') && !empty($request->input('nombre'))) {
            $nomb = $request->nombre;
            $ndiv = explode(" ",$nomb);
            $nom = $ndiv[0];
            $apell = $ndiv[1];
            $pacient = Paciente::select('id','nombres','apellidos','cedula','celular','correo')
                ->where('nombres','like', $nom.'%')
                ->where('apellidos','like',$apell.'%')
                ->get();
            $ruta = route('citas.create');
            if ($pacient->isNotEmpty()){
                return view('paciente.index', compact('pacient','ruta'));
            } else {
                $noExist = "No Existe un Paciente con El nombre Consultado";
                return view("paciente.ConsPac", compact('noExist'));
            }
            } else {
                return view("paciente.ConsPac");
            }
       }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('paciente.creaPac');
        //return view('prueba');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //$pacient = $request;
        $pacient = new Paciente;
        $pacient->nombres = $request->nomb;
        $pacient->apellidos = $request->apell;
        $pacient->fecnac = $request->fecnac;
        $pacient->nacionid = $request->nacionid;
        $pacient->sexoid = $request->sexoid;
        $pacient->edocivid = $request->edocivid;
        $pacient->cedula = $request->cedula;
        $pacient->celular = $request->celular;
        $existe = Paciente::where('cedula',$pacient->cedula)->exists();
        if ($existe == 'true') {
            $cedula=$pacient->cedula;
            return redirect()->route('paciente.index', ['cedula'=>$cedula, 'exist' => 'si']);

           // return view('prueba', compact('mensaje'));*/
        } else {
            $pacient->save();
            $id = $pacient->id;
            $cedula=$pacient->cedula;
            return redirect()->route('paciente.index', ['cedula'=>$cedula]);
        }


        //return view('paciente.index', compact('pacient'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $pacient = Paciente::find($id);
        return view('paciente.detPac', compact('pacient'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pacient = Paciente::find($id);
        return view('paciente.editPac', compact('pacient'));
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
        $pacient = Paciente::find($id);
        $pacient->nombres = $request->nombres; $pacient->apellidos = $request->apellidos;
        $pacient->fecnac = $request->fecnac; $pacient->nacionid = $request->nacion;
        $pacient->lugarnac = $request->lugarnac; $pacient->sexoid = $request->sexoid;
        $pacient->edocivid = $request->eciv; $pacient->profesion = $request->profes;
        $pacient->celular = $request->celular; $pacient->correo = $request->correo;
        $pacient->dirhab = $request->dirhab; $pacient->tlfhab = $request->tlfhab;
        $pacient->dirofc = $request->dirofc; $pacient->tlfofc = $request->tlfofc;
        $pacient->cedrepres = $request->cedrepres; $pacient->representante = $request->representatnte;
        $pacient->referido = $request->referido; $pacient->fecreg = $request->fecreg;
        $pacient->cedula = $request->cedula;
        $pacient->antecedentes = $request->antecedentes; $pacient->historia = $request->historia;
        $pacient->save();
        Return redirect()->route('paciente.show', [$id]);
        //return view('prueba2', compact('id','request'));
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

    public function buscar()
    {
        return view('paciente.ConsPac');
    }
}
