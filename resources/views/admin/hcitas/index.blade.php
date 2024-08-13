@extends('adminlte::page')

@section('content_header')
<div class="d-flex justify-content-center">
    <h1>Administrar Horas de Citas</h1>
</div>
@stop

@section('content')
    <div class="d-flex justify-content-start">
        <a type="button" class="btn btn-success text-dark" href=" {{ route('hcitas.create') }} ">Crear Nuevo Set de Horas</a>
    </div>

     <table id="hctab"  class="stripe cell-border hover">
            <thead>
                <tr>
                    <th>ID.</th>
                    <th>Hora.</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($horas as $hora)
                    <tr>
                        <td>{{$hora->id}}</td>
                        <td>{{$hora->hora}}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@stop

@section('css')
<link rel="stylesheet" href="{{ asset('css/datatables.min.css')}}">
@stop

@section('js')
<script type="text/javascript" charset="utf8" src="{{ asset('js/jquery-3.6.0.min.js')}}"></script>
<script type="text/javascript" charset="utf8" src="{{ asset('js/jquery.dataTables.min.js')}}"></script>

<script type="text/javascript">
    var $jq=jQuery.noConflict(true);
</script>
<script>
    $jq(document).ready( function () {
        $jq('#hctab').DataTable();
    });
</script>
