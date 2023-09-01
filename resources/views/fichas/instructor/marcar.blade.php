@extends('index_instructor')


@section('content')

    <form  action="{{ route('fichas.instructor.asistenceQr') }}" method="POST">
        @csrf
        <input readonly hidden type="text" placeholder="" value="{{ $ficha->code }}"  name="ficha">
        <input type="text" placeholder="Escanar el QR" id='datos'  name="datos" autofocus>
        <button type="submit" value="ok" name="capturar" class="btn btn-primary">Enviar</button>
    </form>
    
    @if(session('error'))
        <script>
            Swal.fire({
                icon: 'error',
                title: 'Error',
                text: '{{ session('error') }}',
                confirmButtonText: 'Cerrar',
                timer: 1500
            });
            document.getElementById("datos").focus();
        </script>
    @endif
    @if(session('success'))
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Éxito',
                text: '{{ session('success') }}',
                confirmButtonText: 'Cerrar',
                timer: 1500
            });
            document.getElementById("datos").focus();
        </script>
    @endif
    
@endsection