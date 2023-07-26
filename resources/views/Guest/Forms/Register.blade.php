@extends('Layouts.guest')

@section('content')
    <div class="form-box flex flex-col container">
        <form action={{ route('register') }} class="form flex flex-col" method="POST" enctype="multipart/form-data">
            @csrf
            <h1 class="form-header">Register</h1>
            <input type="text" name="name" id="name" class="name" placeholder="Name" required>
            <input type="email" name="email" id="email" class="email" placeholder="Email" required>
            <input type="password" name="password" id="password" class="password" placeholder="Password" required>
            <div class="image-box flex align-center">
                <label for="image" class="user-img-label">User Image</label>
                <input accept="image/png , image/jpeg , image/jpg ,image/webp" type='file' id="image" name="image"
                    class="user-img" required />
            </div>
            <img class="showUserImg" src="" alt="your image" />
            <div class="flex align-center justify-space-between">
                <a href={{ route('login') }} class="already-reg">Already Registered?</a>
                <button class="register-button">Register</button>
            </div>
        </form>



    </div>
    <script src={{ asset('js/previewUserImg.js') }}></script>
@endsection
