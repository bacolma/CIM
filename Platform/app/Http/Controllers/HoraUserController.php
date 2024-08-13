<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\TipoHorario;
use App\Models\Hcita;
use App\Models\horauser;
use Illuminate\Http\Request;
use League\CommonMark\Extension\CommonMark\Renderer\Block\ThematicBreakRenderer;

use function PHPUnit\Framework\isNull;

class HoraUserController extends Controller
{
    public function index() {
        //$horAsig = horauser::all();
        $horAsig = horauser::select('horausers.id','users.name','tipo_Horarios.descripcion',
            'horausers.horaini','horausers.horafin')
            ->join('users','horausers.id','=','users.id')
            ->join('tipo_horarios','tipo_horarios.id','=','horausers.horario_id')
            ->get();
        return view('admin.HoraUser.index', compact('horAsig'));
        //return view('prueba2', compact('horAsig'));
    }

    public function create(Request $request) {
        $id = $request->id;
        $usuar = User::find($id);
        return view('admin.users.asighorario', compact('usuar'));
    }

    public function store(Request $request) {
        $usrid = $request->id;
        $horarioId = $request->intervalo;
        $horini = $request->horini;
        $horfin = $request->horfin;
        $qry = horauser::updateOrInsert([
                'user_id' => $usrid],
                ['horario_id' => $horarioId,
                'horaini' => $horini,
                'horafin' => $horfin
        ]
        );

        //return view('prueba2', compact('usrid','horarioId','horini','horfin'));
        return redirect()->route('usrAsignHor.index');
    }
}
