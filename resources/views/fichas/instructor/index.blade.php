@extends('index_instructor')

@section('content')

<div class="titulos">
    <div>
        <h1>Listado de fichas</h1>
    </div>
</div>

<div class="container2">
    <div class="row justify-content-center">
        <div class="table-responsive-xl mt-5">
            <table id="myTable" class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th>Codigo</th>
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
                                    <a href="{{ route('fichas.instructor.view', $ficha->code) }}" class="btn btn-primary">Visualizar</a>
                                </td>
                            </tr>
                        @endif
                    @endforeach
                </tbody>
            </table>

        </div>
    </div>
</div>
    
@endsection