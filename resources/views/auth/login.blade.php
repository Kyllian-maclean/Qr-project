@extends('layouts.app')

@section('content')
<div class="wrapper">
    <div class="container main">
        <div class="row">
            <div class="col-md-6 side-image">
            </div>
                <div class="col-md-6 rigth">
                
                    <div class="input-box">
                        <form method="POST" action="{{ route('login') }}">
                            @csrf
                            <header>
                                <h1>Iniciar sesion</h1>
                            </header>
                            
                            <div class="input-field">

                                <div class="input field">
                                    <select id="role" class="form-select @error('role') is-invalid @enderror" name="role" required>
                                        <option value="" disabled selected>Selecciona un Rol</option>
                                        <option value="1">Administrador</option>
                                        <option value="2">Instructor</option>
                                        <option value="3">Aprendiz</option>

                                    </select>

                                    @error('role')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="input-field">
                                <input id="code" type="text" class="input @error('code') is-invalid @enderror" name="code" value="{{ old('code') }}" required autocomplete="code" autofocus>
                                <label for="code">Numero de documento</label>
                            
                                    @error('code')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                
                            </div>

                            <div class="input-field">
                                <input id="password" type="password" class="input @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                                <label for="password">{{ __('Contraseña') }}</label>

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                            </div>


                            <div >
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Recordar') }}
                                    </label>
                                </div>

                                
                            </div>

                            <div class="signin">
                                
                                    <button type="submit" class="submit btn btn-primary">
                                        {{ __('Login') }}
                                    </button>
                                    @if (Route::has('password.request'))
                                        <a class="btn btn-link" href="{{ route('password.request') }}">
                                            {{ __('Recuperar Contraseña?') }}
                                        </a>
                                    @endif
                                
                            </div>
                            

                            
                        </form>
                    @if(session('error'))
                    <script>
                        Swal.fire({
                            icon: 'error',
                            title: 'Error',
                            text: '{{ session('error') }}',
                            confirmButtonText: 'Cerrar'
                        });
                    </script>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
