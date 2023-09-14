@extends('index_aprendiz')

@section('content')

<div class="container row justify-content-center mt-3 mb-5">
  <div class="titulos-perfil">
      <div>
          <h1>Perfil de usuario</h1>
      </div>
  </div>
  <div class="contenedor-columnas">
    <form action="{{ route('users.update', ['user' => $user] ,['userRoleIds'=>$userRoleIds]) }}" method="POST">
        @csrf
        @method('PUT')
      <div class="info-usuario1">
        
        <div class="coolinput ">
            <label for="code" class="text">DNI:</label>
            <input disabled type="text" name="code" id="code" class=" input" value="{{ $user->code }}" required>
        </div>

        <div class="coolinput">
            <label for="first_name" class="text">Nombres</label>
            <input disabled type="text" name="first_name" id="first_name" class="input" step="0.01" value="{{ $user->first_name }} " required>
        </div>

        <div class="coolinput">
            <label for="last_name" class="text">Apellidos</label>
            <input disabled type="text" name="last_name" id="last_name" class="input" step="0.01" value="{{$user->last_name}}" required>
        </div>

        <div class="coolinput">
            <label for="email" class="text">Correo Electronico</label>
            <input disabled type="text" name="email" id="email" class="input " step="0.01" value="{{$user->email}}" required>
        </div>

        <div class="coolinput">
            <label for="status" class="text">Estado</label>
            <select disabled required class="input" name="status" id="status" type="text">
                <option value="active" {{ $user->status === 'active' ? 'selected' : '' }}>Activo</option>
                <option value="inactive" {{ $user->status === 'inactive' ? 'selected' : '' }}>Inactivo</option>
            </select>
        </div>
        
        <br>
        <div class="form-group mb-3">
            <label for="status" class="text">Roles</label>
            <div class="form-check">
              @if(in_array(3, $userRoleIds))
                <input disabled class="input" checked type="checkbox" name="aprendiz" id="aprendiz">
              @else
                <input disabled class="input" type="checkbox" name="aprendiz" id="aprendiz">
              @endif
              <label class="text" for="aprendiz">Aprendiz</label>
            </div>

            <div class="form-check">
              @if(in_array(2, $userRoleIds))
                <input disabled class="input" checked type="checkbox" name="instructor" id="instructor">
              @else
                <input disabled class="input" type="checkbox" name="instructor" id="instructor">
              @endif
              <label class="form-check-label" for="instructor">Instructor</label>
            </div>

            <div class="form-check">
              @if(in_array(1, $userRoleIds))
                <input disabled class="input" checked type="checkbox" name="admin" id="admin">
              @else
                <input disabled class="input" type="checkbox" name="admin" id="admin">
              @endif
              <label class="form-check-label" for="admin">Administrador</label>
            </div>
          </div>
        </div>
    </form>
    <br>
    <br>
    <br>
    <div class="info-usuario">
      <form action="{{ route('updatesPassword') }}" method="POST">
        <div class="cambio-contra">     
          @csrf
          <div class="coolinput">
            <label for="currentPassword" class="text">Contraseña actual</label>
            <input type="password" name="currentPassword" id="currentPassword" class="form-control" step="0.01" required>
          </div>
          <div class="coolinput">
            <label for="newPassword" class="text">Nueva contraseña</label>
            <input type="password" name="newPassword" id="newPassword" class="form-control" step="0.01" required>
          </div>
          <div class="coolinput">
            <label for="confirmation" class="text">Confirmar contraseña</label>
            <input type="password" name="confirmation" id="confirmation" class="form-control" step="0.01" required>
          </div>

          <button class="btn btn-danger mt-4" type="submit">Cambiar Contraseña</button>
        </div>
        
      </form>
      
        
      
  </div>  
  <div class="mb-4">
          {!!QrCode::size(200)->generate($user->code); !!}
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