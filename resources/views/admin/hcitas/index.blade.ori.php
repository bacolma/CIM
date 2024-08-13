@extends('adminlte::page')

@section('content_header')
<div class="d-flex justify-content-center">
    <h1 class="underline">Administrar Horas de Citas</h1>
</div>
@stop

@section('css')
    <link rel="stylesheet" href="{{ asset('css/app.css')}}">
    <link rel="stylesheet" href="{{ asset('css/datatables.min.css')}}">
@stop

@section('content')
    <div class="d-flex justify-content-start">
        <a type="button" class="btn btn-success text-dark" href=" {{ route('hcitas.create') }} ">Crear Nuevo Set de Horas</a>
    </div>
    <div class="h-10"></div>
    <div>
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

@section('js')
    <script type="text/javascript" src="{{ asset('js/app.js')}}" defer></script>
    <script type="text/javascript" charset="utf8" src="{{ asset('js/datatables.min.js')}}" ></script>
    <script>
        $(document).ready( function () {
            $('#hctab').DataTable();
        });
    </script>
@stop
