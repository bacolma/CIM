@extends('adminlte::page')

@section('content_header')
<div class="d-flex justify-content-center">
        <h1>Menú Administrativo de Usuarios.</h1>
    </div>
@stop

@section('content')
    <table id="usrtab"  class="stripe cell-border hover">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Correo</th>
                <th>Role</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
                <tr>
                    <td>{{$user->id}}</td>
                    <td>{{$user->name}}</td>
                    <td>{{$user->email}}</td>
                    <td><a class="btn btn-primary" href="{{route('usrAsignHor.create', [ 'id' => $user->id ])}}" role="button">Asignar Horario a Usuario</a></td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <!-- <a class="btn btn-primary" href="#" role="button">Asignar Horario a Usuario</a> -->
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
        $jq('#usrtab').DataTable();
    });
</script>
