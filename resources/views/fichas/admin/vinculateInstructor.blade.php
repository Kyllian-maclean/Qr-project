@extends('index') <!-- Suponiendo que estás utilizando una plantilla de Blade llamada 'app.blade.php' que carga los estilos de Bootstrap -->

@section('content')
    <a href="{{ route('fichas.view', ['ficha' => $ficha]) }}" id="btnBack" class="btn btn-success">Retroceder</a>
   
    <!-- <div class="card-header">{{ __('Vincular Instructor a Ficha') }}</div> -->
    <div class="titulos">
        <div>
           <h1>Vincular instructor</h1>
        </div>
      </div>
        <div class="content mt-5">
            <form method="POST" class="form-body2" action="{{ route('fichas.vinculate.instructor.post', ['ficha' => $ficha]) }}">
                @csrf <!-- Agrega el campo CSRF token para protección contra ataques CSRF -->

                <div class="form-group">
                    <label for="instructor_id">Codigo del instructor</label>
                    <input type="text" name="instructor_id" id="instructor_id" class="form-control3 mt-3" required>
                </div>

                <div class="form-group">
                    <button type="submit" class="guardar btn btn-success">Vincular Instructor</button>
                </div>
            </form>
        </div>
    </div>

@endsection
