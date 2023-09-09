
@extends('index_instructor')

@section('content')

    <a href="{{ route('fichas.instructor.view', ['ficha' => $ficha]) }}" id="btnBack" class="btn btn-primary">Retroceder</a>

<div class="titulos">
    <div>
        <h1>Aprendiz</h1>
    </div>
</div>
<br>

    <form >
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="code">Codigo:</label>
            <input type="number" name="code" id="code" class="form-control" value="{{ $user->code }}" disabled>
        </div>

        <div class="form-group">
            <label for="first_name">Nombres</label>
            <input type="text" name="first_name" id="first_name" class="form-control" step="0.01" value="{{ $user->first_name }} " disabled>
        </div>

        <div class="form-group">
            <label for="last_name">Apellidos</label>
            <input type="text" name="last_name" id="last_name" class="form-control" step="0.01" value="{{$user->last_name}}" disabled>
        </div>

        <div class="form-group">
            <label for="email">Correo Electronico</label>
            <input type="email" name="email" id="email" class="form-control" step="0.01" value="{{$user->email}}" disabled>
        </div>

        <div class="form-group">
            <label for="status">Estado</label>
            <select disabled class="form-control" name="status" id="status">
                <option value="active" {{ $user->status === 'active' ? 'selected' : '' }}>Activo</option>
                <option value="inactive" {{ $user->status === 'inactive' ? 'selected' : '' }}>Inactivo</option>
            </select>
        </div>
        
    </form>
    <br>
    <div class="titulos">
    <div>
        <h1>Asistencia del Aprendiz</h1>
    </div>
</div>
    <a href="{{ route('exportar.asistencias', ['code' => $user->code, 'ficha' => $ficha]) }}" class="btn btn-success">Exportar a Excel</a>

    <br>
<div class="table-responsive-xl mt-3">
    <table id="myTable" class="table table-striped table-hover">
            <thead>
                <tr>
                    <th>DNI</th>
                    <th>Nombre</th>
                    <th>Entrada</th>
                    <th>Salida</th>

                </tr>
            </thead>
            <tbody>
            @foreach ($asistences as $asistencia)
                        <tr>
                            <td>{{ $asistencia->user_id}}</td>
                            <td>{{ $asistencia->first_name}} {{ $asistencia->last_name}}</td>
                            <td>{{ $asistencia->date}}</td>
                            <td>{{ $asistencia->create_at_salida }}</td>
                        </tr>
                    @endforeach
            </tbody>
    </table>

</div>
    
    <br>
    


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