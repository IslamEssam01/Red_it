@extends('Layouts.main')

@section('content')
    <div class="form-box flex flex-col container">
        <form action={{ route('login') }} class="form flex flex-col" method="POST">
            @csrf
            <h1 class="form-header">Login</h1>
            @error('email')
                <p class="error">{{ $message }}</p>
            @enderror
            <input type="email" name="email" id="email" class="email" placeholder="Email" value="{{ old('email') }}"
                required>
            <input type="password" name="password" id="password" class="password" placeholder="Password" required>
            <div class="flex align-center checkbox">
                <input type="checkbox" name="rememberMe" id="rememberMe" value={{ true }}>
                <label for="rememberMe">Remember Me</label>
            </div>
            <button class="login-button">Login</button>
        </form>

        <div class="flex align-center container form-footer">
            <p>Don't have an account?</p>
            <a href={{ route('register') }}>Register</a>
        </div>

    </div>
@endsection
