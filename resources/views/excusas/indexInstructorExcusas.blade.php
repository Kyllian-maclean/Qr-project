
@extends('index_instructor')

@section('content')

<div class="titulos">
    <div>
        <h1>Excusas del aprendiz</h1>
    </div>
</div>

    <div class="container2">
        <div class="row justify-content-center">
            <div class="table-responsive-xl mt-5">
                <table id="myTable" class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th>Dni Aprendiz</th>
                            <th>DNI</th>
                            <th>Aprendiz</th>
                            <th>Estado</th>
                            <th>Fecha</th>
                            <th>Motivo</th>
                            <th>Archivo</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                @foreach ($excusas as $excusa)
                
                    <tr>
                        <td>{{ $excusa->aprendiz_id }}</td>
                        <td>{{ $excusa->first_name }} {{ $excusa->last_name }} </td>
                        <td>
                            {{ $excusa->estado }}
                        </td>
                        <td>{{ $excusa->date }}</td>
                        <td>
                            <div class="textarea-container">
                                <textarea class="form-control excusa-motivo" rows="3" readonly>{{ $excusa->motivo }}</textarea>
                            </div>
                        </td>
                        <td>
                            <p>{{ $excusa->file_path }}</p>
                            <a href="{{ route('descargar.pdf', ['nombreArchivo' => $excusa->file_path]) }}" class="btn btn-sm btn-primary"><i class="fa-solid fa-download"></i></a>
                        </td>
                        <td>
                            <div class="btn-group">
                                @if($excusa->estado == 'Pendiente')
                            
                                <form  style="display: inline;" action="{{ route('fichas.instructor.aprobar', ['excusa' => $excusa]) }}" method="post">
                                    @csrf
                                    <button type="submit" class="btn btn-success"><i class="fa-solid fa-check"></i></button>
                                </form>

                                <form  style="display: inline;" action="{{ route('fichas.instructor.rechazar', ['excusa' => $excusa]) }}" method="post">
                                    @csrf
                                    <button type="submit" class="btn btn-danger"><i class="fa-solid fa-xmark"></i></button>
                                </form>
                            </div>
                            
                            <div class="btn-group">
                                @elseif($excusa->estado == 'Aprobado')
                                <form  style="display: inline;" action="{{ route('fichas.instructor.rechazar', ['excusa' => $excusa]) }}" method="post">
                                    @csrf
                                    <button type="submit" class="btn btn-danger"><i class="fa-solid fa-xmark"></i></button>
                                </form>

                                @else
                                <form  style="display: inline;" action="{{ route('fichas.instructor.aprobar', ['excusa' => $excusa]) }}" method="post">
                                    @csrf
                                    <button type="submit" class="btn btn-danger"><i class="fa-solid fa-check"></i></button>
                                </form>
                                @endif
                            </div>
                            
                        </td>
                    
                    </tr>
                
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