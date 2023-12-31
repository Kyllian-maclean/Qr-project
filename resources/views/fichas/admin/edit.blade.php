
@extends('index')

@section('content')

    <a href="{{ route('fichas.index') }}" id="btnBack" class="btn btn-success">Retroceder</a>

    <div class="titulos">
        <div>
           <h1>Editar Programa</h1>
        </div>
      </div>
    <div class="content ">
        <form action="{{ route('fichas.update', ['ficha' => $ficha]) }}" method="POST" class="form-body2">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="code">Ficha:</label>
                <input type="number" name="code" id="code" class="form-control3 mt-3" value="{{ $ficha->code }}" required>
            </div>

            <div class="form-group">
                <label for="programa_formacion">Nombres</label>
                <input type="text" name="programa_formacion" id="programa_formacion" class="form-control3 mt-3" step="0.01" value="{{ $ficha->programa_formacion }} " required>
            </div>

            <div class="form-group">
                <label for="status">Estado</label>
                <select required class="form-control3 mt-3" name="status" id="status">
                    <option value="active" {{ $ficha->status === 'active' ? 'selected' : '' }}>Activo</option>
                    <option value="inactive" {{ $ficha->status === 'inactive' ? 'selected' : '' }}>Inactivo</option>
                </select>
            </div>
            
            
            <button type="submit" class="guardar btn btn-success">Actualizar</button>
            <a href="{{ route('fichas.index') }}" class=" guardar btn btn-secondary">Cancelar</a>
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