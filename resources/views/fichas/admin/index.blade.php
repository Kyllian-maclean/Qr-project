@extends('index')

@section('content')
<div class="titulos-fichas">
    <div>
        <h1>Listado de Fichas</h1>
    </div>
</div>

<div class="botones">
    <form action="{{ route('importar.fichas') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="input-group mb-3 mt-3">
            <div class="input-group-append">
                <a href="{{ route('fichas.create') }}" class="btn-index btn btn-success">Crear Ficha</a>
                <a href="{{ route('exportar.fichas') }}" class="btn-index btn btn-success">Exportar a Excel</a>
                <button type="submit" class=" btn-index btn btn-primary">Importar</button>
            </div>
            <div class="custom-file">
                
                <input required type="file" name="archivo" id="archivo">
    
            </div>
        </div>
    </form>

</div>
    

    <div class="container2">
        <div class="row justify-content-center">
            <div class="table-responsive-xl mt-5">
                <table id="myTable" class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th>Ficha</th>
                            <th>Nombre</th>
                            <th>Estado</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($fichas as $ficha)
                            @if ($ficha instanceof \App\Models\Ficha)
                                <tr>
                                    <td>{{ $ficha->code }}</td>
                                    <td>{{ $ficha->programa_formacion }}</td>
                                    <td>{{ $ficha->status }}</td>
                                    <td>
                                        <a href="{{ route('fichas.edit', $ficha->code) }}" class="btn btn-primary">Editar</a>
                                        @if ($ficha->status == 'inactive')
                                            <form action="{{ route('fichas.activate', $ficha->code) }}" method="POST" style="display: inline;">
                                                @csrf
                                                @method('PUT')
                                                <button type="submit" class="btn btn-danger">Activar</button>
                                            </form>
                                        @endif
                                        @if ($ficha->status == 'active')
                                            <form action="{{ route('fichas.destroy', $ficha->code) }}" method="POST" style="display: inline;">
                                                @csrf
                                                @method('PUT')
                                                <button type="submit" class="btn btn-danger">Inactivar</button>
                                            </form>
                                        @endif
                                        <a href="{{ route('fichas.view', $ficha->code) }}" class="btn btn-primary">Visualizar</a>
                                    </td>
                                </tr>
                            @endif
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
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
    @if(session('success'))
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Éxito',
                text: '{{ session('success') }}',
                confirmButtonText: 'Cerrar'
            });
        </script>
    @endif
@endsection