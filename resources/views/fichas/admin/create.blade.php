
@extends('index')

@section('content')
    <a href="{{ route('fichas.index') }}" id="btnBack" class="btn btn-success">Retroceder</a>

    <div class="titulos-crear">
        <div>
           <h1>Crear Programa</h1>
        </div>
      </div>

    <div class="content">
        <form action="{{ route('fichas.store') }}" method="POST" class="form-body2">
            @csrf

            <div class="form-group">
                <label for="code">Numero de ficha</label>
                <input type="number" name="code" id="code" class="form-control2 mt-3" required>
            </div>

            <div class="form-group">
                <label for="programa_formacion">Nombre</label>
                <input type="text" name="programa_formacion" id="programa_formacion" class="form-control2 mt-3" step="0.01" required>
            </div>
            
            <button type="submit" class="guardar btn btn-success">Guardar</button>
            <a href="{{ route('fichas.index') }}" class="guardar btn btn-secondary">Cancelar</a>
       
        </form>
    </div>
    
    @if(session('error'))
    <script>
        Swal.fire({
            icon: 'error',
            title: 'Error',
            text: '{{ session('error') }}',
            confirmButtonText: 'Cerrar'
        });
    </script>
    @endif
@endsection
