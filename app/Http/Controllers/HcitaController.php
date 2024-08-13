<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Hcita;
use Illuminate\Support\Facades\DB;

class HcitaController extends Controller
{
    public function index()
    {
        /*$usu = auth()->user()->id;
        $husu = Hcita::find($usu);
        $hinid = hcita::select(hcita.id)
            ->where() */
        $horas = hcita::all();
        return view('admin.hcitas.index', compact('horas'));
        //return $horas;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.hcitas.create');
    }

    public function store(Request $request)
    {
        $hini = $request->hini;
        $hfin = $request->hfin;
        $minuto = $request->minuto;

        $horas = DB::select('call CrearHoraCita(?,?,?)', array($hini, $hfin, $minuto));

        return redirect()->route('hcitas.index')
        ->with('success', 'Horas Generadas Satisfactoriamente');

    }
}
