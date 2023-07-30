<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" href={{ asset('css/general.css') }}>
    <link rel="stylesheet" href={{ asset('css/user/sidebar.css') }}>
    <link rel="stylesheet" href={{ asset('css/user/header.css') }}>
    <link rel="stylesheet" href={{ asset('css/home.css') }}>
    <link rel="stylesheet" href={{ asset('css/user/Forms/formGeneral.css') }}>
    <link rel="stylesheet" href={{ asset('css/user/Forms/formAddPost.css') }}>

    <title>Red_it</title>
</head>

<body>
    <div class="display-none overlay"></div>

    @include('User.Includes.header')

    @yield('content')
    <script src={{ asset('js/searchModal.js') }}></script>
</body>

</html>
