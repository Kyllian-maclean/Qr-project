
@extends('index_aprendiz')

@section('content')
<div class="titulos">
    <div>
        <h1>Asistencia del Aprendiz</h1>
    </div>
</div>
<div class="table-responsive-xl mt-3">
    <table id="myTable" class="table table-striped table-hover">
        <thead>
            <tr>
                <th>Dni Aprendiz</th>
                <th>Fecha</th>

            </tr>
        </thead>
        <tbody>
            @foreach ($asistences as $asist)
               
                <tr>
                    <td>{{ $asist->user_id }}</td>
                    <td>{{ $asist->date }}</td>
                </tr>
            
            @endforeach
        </tbody>
    </table>
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