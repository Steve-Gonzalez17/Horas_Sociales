@extends('layouts.app')
@include('components.login')
@section('content')
<!DOCTYPE html>
<html lang="en">

<body>
    <div class="container-form login">
        <div class="information">
            <div class="info-childs">
                <img src="{{ asset('img/cruz-roja-logo.jpeg') }}" alt="Cruz Roja" style="height: 100px">
                <h2>Sistema de vales de combustible</h2>
                <span>Cruz Roja Salvadoreña</span>
            </div>
        </div>
        <div class="form-information">

            <div class="form-information-childs">
                <div class="clock">
                    <span id="hours">00</span>:<span id="minutes">00</span>:<span id="seconds">00</span>
                    <span id="ampm">AM</span> <!-- Este nuevo span muestra AM o PM -->
                </div>
                <h2>¡Bienvenid@! 🚑</h2>
                <p>Ingresa tus credenciales para iniciar sesión</p>
                <form class="form form-register" method="POST">
                    @if ($errors->has('login'))
                        <div class="alert alert-danger">
                            {{ $errors->first('login') }}
                        </div>
                    @endif
                    @csrf
                    <div>
                        <label>
                            <i class='bx bx-user'></i>
                            <input class="input_custom" id="username" type="text" @error('username') is-invalid
                            @enderror" name="username" value="{{ old('username') }}" required
                                autocomplete="username" autofocus placeholder="Ingrese un Usuario">
                            @error('username>')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </label>
                    </div>
                    <div>
                        <label>
                            <i class='bx bx-key'></i>
                            <input class="input_custom" id="password" type="password" @error('password') is-invalid
                            @enderror" name="password" required autocomplete="current-password" autofocus
                                placeholder="Ingrese una Contraseña">
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </label>
                    </div>
                    <input type="submit" value="Ingresar">
                </form>
            </div>
        </div>
    </div>
</body>

</html>
@endsection