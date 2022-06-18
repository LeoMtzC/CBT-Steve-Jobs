@extends('layouts.alumno.admin')

@section('titulo', 'Generar / Permiso')

@section('contenido')

    <!-- Generar permiso -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-alumno">Permiso</h6>
        </div>
        <div class="card-body">
            <p>
                El permiso es aquel documento el cual es necesario para...
            </p>
            <br>
            <p>
                Una vez que generes tu permiso recuerda que...
            </p>
            <br>
            <p>
                Si los datos mostrados no son correctos, asegúrate de haber llenado correctamente tus datos personales en la sección <b>'Mis datos'</b>.
            </p>
            <br>
            <div class="text-left">
                <a href="https://drive.google.com/drive/folders/1v20_hzXO5HZ4QW1TNgE30C8GkELzrnT5?usp=sharing" type="button" 
                    target="_blank" class="btn btn-alumno" id="genPermiso"><i class="fas fa-folder-open"></i> Obtener</a>
            </div>
        </div>
    </div>

@endsection