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

                            <div class="form-check">
                            <input id="inpLock" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                <label class="btn-lock" for="inpLock">
                                    <svg width="18" height="20" viewBox="0 0 36 40">
                                        <path class="lockb" d="M27 27C27 34.1797 21.1797 40 14 40C6.8203 40 1 34.1797 1 27C1 19.8203 6.8203 14 14 14C21.1797 14 27 19.8203 27 27ZM15.6298 26.5191C16.4544 25.9845 17 25.056 17 24C17 22.3431 15.6569 21 14 21C12.3431 21 11 22.3431 11 24C11 25.056 11.5456 25.9845 12.3702 26.5191L11 32H17L15.6298 26.5191Z"></path>
                                        <path class="lock" d="M6 21V10C6 5.58172 9.58172 2 14 2V2C18.4183 2 22 5.58172 22 10V21"></path>
                                        <path class="bling" d="M29 20L31 22"></path>
                                        <path class="bling" d="M31.5 15H34.5"></path>
                                        <path class="bling" d="M29 10L31 8"></path>
                                        
                                    </svg>
                                </label>
                                <label for="">Recordarme</label>
 main
                                
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
