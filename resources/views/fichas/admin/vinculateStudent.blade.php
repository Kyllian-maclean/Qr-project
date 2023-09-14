@extends('index') <!-- Suponiendo que estás utilizando una plantilla de Blade llamada 'app.blade.php' que carga los estilos de Bootstrap -->

@section('content')
<div class="container">
    <a href="{{ route('fichas.view', ['ficha' => $ficha]) }}" id="btnBack" class="btn btn-success">Retroceder</a>
    <div class="titulos">
        <div>
           <h1>Vincular Aprendiz</h1>
        </div>
      </div>
                <!-- <div class="card-header">{{ __('Vincular Estudiante a Ficha') }}</div> -->

        <div class="content mt-5">
            <form method="POST" class="form-body2" action="{{ route('fichas.vinculate.students.post', ['ficha' => $ficha]) }}">
                @csrf <!-- Agrega el campo CSRF token para protección contra ataques CSRF -->

                <div class="form-group">
                    <label for="student_id">Codigo del aprendiz</label>
                    <input type="text" name="student_id" id="student_id" class="form-control3 mt-3" required>
                </div>

                <div class="form-group">
                    <button type="submit" class="guardar btn btn-success">Vincular Aprendiz</button>
                </div>
            </form>
        </div>
    
        
    

@endsection
