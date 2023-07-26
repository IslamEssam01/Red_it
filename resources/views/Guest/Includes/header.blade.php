<header class="header flex justify-space-between align-center">

    <div class="logo-box flex align-center">
        <a href={{ route('home') }}><img src={{ asset('storage/images/logo/logo.webp') }} alt="logo" class="logo"></a>

        <a href={{ route('home') }} class="logo-text">Red_it</a>
    </div>

    <form action="#" class="search-form" method="POST">
        @csrf
        <span class="search-icon">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                stroke="currentColor" class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="M15.75 15.75l-2.489-2.489m0 0a3.375 3.375 0 10-4.773-4.773 3.375 3.375 0 004.774 4.774zM21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>
        </span>
        <input type="text" name="search" id="search" placeholder="search" class="search">
    </form>


    <a href={{ route('login') }} class="header-login-button">Login</a>


</header>