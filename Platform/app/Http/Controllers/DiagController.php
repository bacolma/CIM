<?php

namespace App\Http\Controllers;

use App\Models\diag;
use Illuminate\Http\Request;
// use App\Http\Requests\StorediagRequest;
// use App\Http\Requests\UpdatediagRequest;

class DiagController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $drid = auth()->user()->id;
        $diags = diag::select('id','descripcion')
            ->where('drid','=', $drid)->get();
        return view('diags.index', compact('diags'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('diags.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorediagRequest  $request
     * @return \Illuminate\Http\Response
     */
    //public function store(StorediagRequest $request)
    public function store(Request $request)
    {
        $datos = $request->validate(['desc'=>'required']);
        $drid = auth()->user()->id;
        $desc = $request->desc;
        $diag = diag::insertGetId(
            [
                'descripcion' => $desc,
                'drid' => $drid
                ]
        );
        return redirect()->route('diagn.show', [ 'diagn' => $diag ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\diag  $diag
     * @return \Illuminate\Http\Response
     */
    //public function show(diag $diag)
    public function show($diag)
    {
        $id = $diag;
        $datos = diag::find($id);
        $dinfo = $datos->descripcion;
        return view('diags.show', compact('id','dinfo'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\diag  $diag
     * @return \Illuminate\Http\Response
     */
    //public function edit(diag $diag)
    public function edit(Request $request)
    {
        $id = $request->diagn;
        $datos = diag::find($id);
        $dinfo = $datos->descripcion;
        return view('diags.edit', compact('id','dinfo'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatediagRequest  $request
     * @param  \App\Models\diag  $diag
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $diag)
    {
        $datos = $request->validate(['desc'=>'required']);
        $id = $diag;
        $desc = $request->desc;
        $upd = diag::find($id)->update(['descripcion'=>$desc]);
        $datos = diag::find($id);
        $dinfo = $datos->descripcion;
        //return view('prueba', compact('id','dinfo'));
        return view('diags.show', compact('id','dinfo'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\diag  $diag
     * @return \Illuminate\Http\Response
     */
    public function destroy(diag $diagn)
    {
        $diagn->delete();
        return back()  
            ->with('success','Diagnóstico Eliminado Satisfactoriamente');
    }
}
