@extends('adminlte::page')

@section('content_header')
<div class="d-flex justify-content-center">
    <h1>Datos Nueva Consulta</h1>
</div>
@stop

@section('content')
    @include('historia.encab')
    <form action="{{route('historia.store')}}" autocomplete="off" method="POST">
        @csrf
        <nav>
            <div class="nav nav-tabs" id="tabMenu"  role="tablist">
                <a class="nav-link text-dark bg-primary active" id="navTabHis1" data-toggle="tab" role="tab" href="#tabhis1" aria-controls="tabhis1" aria-selected="true">Sintomas</a>
                <a class="nav-link text-dark bg-primary" id="navTabHis2" data-toggle="tab" role="tab" href="#tabhis2" aria-controls="tabhis2" aria-selected="false">Tratamiento</a>
                <a class="nav-link text-dark bg-primary" id="navTabHis3" data-toggle="tab" role="tab" href="#tabhis3" aria-controls="tabhis3" aria-selected="false">Exámenes Solicitados</a>
                <a class="nav-link text-dark bg-primary" id="navTabHis4" data-toggle="tab" role="tab" href="#tabhis4" aria-controls="tabhis4" aria-selected="false">Resultados Exámenes</a>
                <a class="nav-link text-dark bg-primary" id="navTabHis5" data-toggle="tab" role="tab" href="#tabhis5" aria-controls="tabhis5" aria-selected="false">Vitales</a>
                <a class="nav-link text-dark bg-primary" id="navTabHis6" data-toggle="tab" role="tab" href="#tabhis6" aria-controls="tabhis6" aria-selected="false">Hábitos</a>
            </div>
        </nav>
        <div><br>

        </div>
        <div class="tab-content" id="tabConten">
            <div class="tab-pane fade show active" id="tabhis1" role="tabpanel" aria-labelledby="navTabHis1">
                <div class="row">
                    <div class="col">
                        <label for="tcons">Tipo de Consulta</label><br>
                        <select id="tcons" name="tcons" class="form-control">
                            <option value="1">Consulta</option>
                            <option value="2">Procedimiento</option>
                            <option value="3">Emergencia</option>
                            <option value="4">Excento</option>
                            <option value="5">Seguro</option>
                        </select>
                    </div>
                    <div class="col">
                        <label for="fecha">Fecha</label><br>
                        <input type="date" id="fecha" name="fecha" class="form-control">
                    </div>
                    <div class="col">
                        <input type="hidden" id="pacid" name="pacid" class="form-control" value={{$dpac->id}}>
                    </div>
                    <div class="col">
                        <input type="hidden" id="drid" name="drid" class="form-control" value={{$dr->id}}>
                    </div>

                </div><br>
                
                
                <div class="row">
                <div class="col">
                    <label for="motcon">Motivo de Consulta</label>
                    <textarea id="motcon" name="motcon" class="form-control" rows="5" cols="20"></textarea>
                </div>
                <div class="col">
                    <label for="texenf">Enfermedad Actual</label>
                    <textarea id="texenf" name="texenf" class="form-control" rows="5" cols="20"></textarea>
                </div>
            </div>
                <div class="row">
                    <div class="col">
                        <label for="vitres">Exámen Físico</label><br>
                        <textarea id="vitres" name="vitres" class="form-control" rows="5" cols="20"></textarea>
                    </div>
                    <div class="col">
                        <label for="otrobs">Diagnóstico</label>
                        <textarea id="otrobs" name="otrobs" class="form-control" rows="5" cols="20"></textarea>
                    </div>
                </div>
            </div>
            <div class="tab-pane fade" id="tabhis2" role="tabpanel" aria-labelledby="NavTabHis2">
                <div class="row">                
                    <div class="col">
                        <label for="antecedentes">Antecedentes Médicos</label>
                        <textarea id="antecedentes" name="antecedentes" class="form-control" rows="5" cols="20">{{$dpac->antecedentes}}</textarea>
                    </div>
                    <div class="col"></div>
                </div>
                <div class="row">
                    <div class="col">
                        <label for="tratamiento">Tratamiento</label>
                        <textarea id="tratamiento" name="tratamiento" class="form-control" rows="5" cols="20"></textarea>
                    </div>   
                    <div class="col">
                        <label for="indicaciones">Indicaciones</label>
                        <textarea id="indicaciones" name="indicaciones" class="form-control" rows="5" cols="20"></textarea>
                    </div>                 
                </div>
                <div class="row">
                    <div class="col">
                        <label for="plater">Planificacion Terapia</label><br>
                        <textarea id="plater" name="plater" class="form-control" rows="5" cols="20"></textarea>
                    </div>
                    <div class="col">
                        <label for="evolucion">Evolución</label>
                        <textarea id="evolucion" name="evolucion" class="form-control" rows="5" cols="20"></textarea>
                    </div>                     
                </div>
                
            </div>
            <div class="tab-pane fade" id="tabhis3" role="tabpanel" aria-labelledby="NavTabHis3">
                <div class="row">
                    <div class="col">
                        <label for="exalab">Exámenes de Laboratorio</label>
                        <textarea id="exalab" name="exalab" class="form-control" rows="5" cols="20"></textarea>
                    </div>
                    <div class="col">
                        <label for="exarad">Exámenes Radiológicos</label>
                        <textarea id="exarad" name="exarad" class="form-control" rows="5" cols="20"></textarea>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <label for="exapre">Exámenes Preoperatorios</label>
                        <textarea id="exapre" name="exapre" class="form-control" rows="5" cols="20"></textarea>
                    </div>
                    <div class="col">
                        <label for="exaesp">Exámenes Especiales</label>
                        <textarea id="exaesp" name="exaesp" class="form-control" rows="5" cols="20"></textarea>
                    </div>
                </div>
            </div>
            <div class="tab-pane fade" id="tabhis4" role="tabpanel" aria-labelledby="NavTabHis4">
                <div class="row">
                    <div class="col">
                        <label for="resexalab">Resultados Exámenes de Laboratorio</label>
                        <textarea id="resexalab" name="resexalab" class="form-control" rows="5" cols="20"></textarea>
                    </div>
                    <div class="col">
                        <label for="resexarad">Resultados Exámenes Radiológicos</label>
                        <textarea id="resexarad" name="resexarad" class="form-control" rows="5" cols="20"></textarea>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <label for="resexapre">Resultados Exámenes Preoperatorios</label>
                        <textarea id="resexapre" name="resexapre" class="form-control" rows="5" cols="20"></textarea>
                    </div>
                    <div class="col">
                        <label for="resexaesp">Resultados Exámenes Especiales</label>
                        <textarea id="resexaesp" name="resexaesp" class="form-control" rows="5" cols="20"></textarea>
                    </div>
                </div>
            </div>
            <div class="tab-pane fade" id="tabhis5" role="tabpanel" aria-labelledby="NavTabHis5">
                <div class="row">
                    <div class="col">
                        <label for="vitpes">Peso</label><br>
                        <input type="text" id="vitpes" name="vitpes" class="form-control">
                    </div>
                    <div class="col">
                        <label for="vittal">Estatura</label><br>
                        <input type="text" id="vittal" name="vittal" class="form-control">
                    </div>
                    <div class="col">
                        <label for="vitten">Tensión</label><br>
                        <input type="text" id="vitten" name="vitten" class="form-control">
                    </div>
                    <div class="col">
                        <label for="vitpul">Pulso</label><br>
                        <input type="text" id="vitpul" name="vitpul" class="form-control">
                    </div>
                </div>
                <br><br>
            </div>
            <div class="tab-pane fade" id="tabhis6" role="tabpanel" aria-labelledby="NavTabHis6">
                <div class="row">
                    <div class="col">
                        <label for="tabaco">Tabaco</label><br>
                        <input type="text" id="tabaco" name="tabaco" class="form-control">
                    </div>
                    <div class="col">
                        <label for="cafe1">Cafe 1</label><br>
                        <input type="text" id="cafe1" name="cafe1" class="form-control">
                    </div>
                    <div class="col">
                        <label for="cafe2">Cafe 2</label><br>
                        <input type="text" id="cafe2" name="cafe2" class="form-control">
                    </div>
                    <div class="col">
                        <label for="medica">Medicamentos</label><br>
                        <input type="text" id="medica" name="medica" class="form-control">
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <label for="droga">Drogas</label><br>
                        <input type="text" id="droga" name="droga" class="form-control">
                    </div>
                    <div class="col">
                        <label for="sueno">Sueño</label><br>
                        <input type="text" id="sueno" name="sueno" class="form-control">
                    </div>
                    <div class="col">
                        <label for="alc1">Alcohol 1</label><br>
                        <input type="text" id="alc1" name="alc1" class="form-control">
                    </div>
                    <div class="col">
                        <label for="alc2">Alcohol 2</label><br>
                        <input type="text" id="alc2" name="alc2" class="form-control">
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <label for="otrhab">Otros Habitos</label><br>
                            <input type="text" id="otrhab" name="otrhab" class="form-control">
                    </div>
                    <div class="col">
                        <label for="inghab">Habito Ing</label><br>
                        <input type="text" id="inghab" name="inghab" class="form-control">
                    </div>
                    <div class="col">
                        <label for="genobs">Fungenobs</label><br>
                        <input type="text" id="genobs" name="genobs" class="form-control">
                    </div>
                    <div class="col">
                    </div>
                </div>
            </div>
        </div>
        <div class="text-right">
            <br>
        <button class="btn btn-primary" type="submit" id="btnSav">Guardar Datos Consulta</button>
     </div>
        </form>
    @stop

    @section('js')
        <script src="{{asset('js/scrptVar.js')}}"></script>
        <script>
            document.getElementById('fecha').valueAsDate = new Date();
        </script>
    @stop
