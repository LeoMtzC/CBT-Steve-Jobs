@extends('layouts.alumno.admin')

@section('titulo', 'Datos del tutor')

@section('contenido')

@include('layouts.partials.messages')

    <!-- Datos del tutor -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-alumno">Tutor</h6>
        </div>
        <div class="card-body">
            <form action="/datos-tutor" method="POST" id="formDatosTutor">
                @csrf
                @if($datosTutor->first())
                <input type="hidden" class="form-control" id="idTutor" name="idTutor"
                    value="{{ $datosTutor[0] -> id }}">
                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label for="nomTut">Nombre</label>
                        <input type="text" class="form-control" id="nomTut" placeholder="Nombre del tutor"
                            name="nomTut" value="{{ $datosTutor[0] -> nombre }}" required>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="apPatTut">Apellido paterno</label>
                        <input type="text" class="form-control" id="apPatTut" placeholder="Apellido Paterno"
                            name="apPatTut" value="{{ $datosTutor[0] -> apPat }}" required>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="apMatTut">Apellido materno</label>
                        <input type="text" class="form-control" id="apMatTut" placeholder="Apellido Materno"
                            name="apMatTut" value="{{ $datosTutor[0] -> apMat }}" required>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label for="curpTut">CURP</label>
                        <input type="text" class="form-control" id="curpTut" placeholder="CURP"
                            name="curpTut" value="{{ $datosTutor[0] -> curp }}" required>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="emailTut">Correo el??ctronico</label>
                        <input type="email" class="form-control" id="emailTut" placeholder="Correo el??ctr??nico"
                            name="emailTut" value="{{ $datosTutor[0] -> correo }}" required>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="telTut">Tel??fono fijo</label>
                        <input type="tel" class="form-control" id="telTut" placeholder="Tel??fono"
                            name="telTut" value="{{ $datosTutor[0] -> telf_fijo }}" required>
                    </div>
                </div>
                <div class="form-row">
                <div class="form-group col-md-4">
                        <label for="celTut">Tel??fono celular</label>
                        <input type="tel" class="form-control" id="celTut" placeholder="Celular"
                            name="celTut" value="{{ $datosTutor[0] -> telf_movil }}" required>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="parentTut">Parentesco</label>
                        <?php $parentescoActual = $parentescos->where('id', $datosTutor[0]->id_parentesco)->pluck('nombre')->toArray(); ?>
                        <select id="parentTut" class="form-control" name="parentTut" required>
                            <option selected value='{{ $datosTutor[0] -> id_parentesco  }}'>{{$parentescoActual[0]}}</option>
                            @foreach ($parentescos as $parentesco)
                            <option value="{{$parentesco->id}}">{{$parentesco->nombre}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                @else
                <input type="hidden" class="form-control" id="idTutor" name="idTutor"
                    value="">
                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label for="nomTut">Nombre</label>
                        <input type="text" class="form-control" id="nomTut" placeholder="Nombre del tutor"
                            name="nomTut" value="" required>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="apPatTut">Apellido paterno</label>
                        <input type="text" class="form-control" id="apPatTut" placeholder="Apellido Paterno"
                            name="apPatTut" value="" required>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="apMatTut">Apellido materno</label>
                        <input type="text" class="form-control" id="apMatTut" placeholder="Apellido Materno"
                            name="apMatTut" value="" required>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label for="curpTut">CURP</label>
                        <input type="text" class="form-control" id="curpTut" placeholder="CURP"
                            name="curpTut" value="" required>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="emailTut">Correo el??ctronico</label>
                        <input type="email" class="form-control" id="emailTut" placeholder="Correo el??ctr??nico"
                            name="emailTut" value="" required>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="telTut">Tel??fono fijo</label>
                        <input type="tel" class="form-control" id="telTut" placeholder="Tel??fono"
                            name="telTut" value="" required>
                    </div>
                </div>
                <div class="form-row">
                <div class="form-group col-md-4">
                        <label for="celTut">Tel??fono celular</label>
                        <input type="tel" class="form-control" id="celTut" placeholder="Celular"
                            name="celTut" value="" required>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="parentTut">Parentesco</label>
                        <select id="parentTut" class="form-control" name="parentTut" required>
                            <option selected value=''>Selecciona una opci??n...</option>
                            @foreach ($parentescos as $parentesco)
                            <option value="{{$parentesco->id}}">{{$parentesco->nombre}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                @endif
                <div class="text-right">
                    <button type="submit" class="btn btn-alumno" id="btnActualuarDatosTutor">Actualizar</button>
                </div>
            </form>
        </div>
    </div>

@endsection

@section('scripts')
<!-- funciones generales -->
<script src="{{asset('libs//scripts/functionsAlumno.js')}}"></script>
<!-- Constantes -->
<script src="{{asset('libs//scripts/constantes.js')}}"></script>
<!-- Validaciones -->
<script src="{{asset('libs//scripts/validacionesAlumno.js')}}"></script>
@endsection