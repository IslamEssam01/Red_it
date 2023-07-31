<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" href={{ asset('css/general/general.css') }}>
    <link rel="stylesheet" href={{ asset('css/general/home.css') }}>
    <link rel="stylesheet" href={{ asset('css/general/header.css') }}>
    <link rel="stylesheet" href={{ asset('css/general/formGeneral.css') }}>

    <link rel="stylesheet" href={{ asset('css/user/sidebar.css') }}>
    <link rel="stylesheet" href={{ asset('css/user/Forms/formAddPost.css') }}>
    <link rel="stylesheet" href={{ asset('css/user/controlPanel.css') }}>

    <link rel="stylesheet" href={{ asset('css/guest/Forms/formLogin.css') }}>
    <link rel="stylesheet" href={{ asset('css/guest/Forms/formRegister.css') }}>


    <title>Red_it</title>
</head>

<body>
    <div class="display-none overlay"></div>

    @include('Includes.header')

    <script src={{ asset('js/searchModal.js') }}></script>
    @yield('content')
</body>

</html>
