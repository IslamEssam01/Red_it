<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" href={{ asset('css/general.css') }}>
    {{-- <link rel="stylesheet" href={{ asset('css/user/style.css') }}> --}}
    <link rel="stylesheet" href={{ asset('css/guest/header.css') }}>
    <link rel="stylesheet" href={{ asset('css/guest/Forms/formGeneral.css') }}>
    <link rel="stylesheet" href={{ asset('css/guest/Forms/formLogin.css') }}>
    <link rel="stylesheet" href={{ asset('css/guest/Forms/formRegister.css') }}>

    <title>Red_it</title>
</head>

<body>
    @include('Guest.Includes.header')
    @yield('content')
</body>

</html>
