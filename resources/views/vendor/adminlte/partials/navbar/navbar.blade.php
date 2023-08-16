<nav class="main-header navbar
    {{ config('adminlte.classes_topnav_nav', 'navbar-expand') }}
    {{ config('adminlte.classes_topnav', 'navbar-white navbar-light') }}">

    {{-- Navbar left links --}}
    <ul class="navbar-nav">
        {{-- Left sidebar toggler link --}}
        @include('adminlte::partials.navbar.menu-item-left-sidebar-toggler')

        {{-- Configured left links --}}
        @each('adminlte::partials.navbar.menu-item', $adminlte->menu('navbar-left'), 'item')

        {{-- Custom left links --}}
        @yield('content_top_nav_left')
    </ul>

    {{-- Navbar right links --}}
    <ul class="navbar-nav ml-auto">
    {{-- Custom right links --}}
    @yield('content_top_nav_right')

    {{-- Configured right links --}}
    @each('adminlte::partials.navbar.menu-item', $adminlte->menu('navbar-right'), 'item')

    {{-- User menu link --}}
    @if(Auth::user())
        @if(config('adminlte.usermenu_enabled'))
        <div class="dropdown display_desktop">
            <button class="btn bg-transparent dropdown-toggle " type="button" data-bs-toggle="dropdown" aria-expanded="false">
                Olá - {{ auth()->user()->name }}
            </button>
            <ul class="dropdown-menu">
                @csrf
                <li><a href="/profile_user" class="dropdown-item">Meu Perfil</a></li>
                <form action="/logout" method="post">
                    @csrf
                    <li><button type="submit" class="dropdown-item">Sair</button></li>
                    {{-- Botão de Logout --}}
                </form>
            </ul>
        </div>
        @else
            @include('adminlte::partials.navbar.menu-item-logout-link')
        @endif
    @endif

    {{-- Right sidebar toggler link --}}
    @if(config('adminlte.right_sidebar'))
        @include('adminlte::partials.navbar.menu-item-right-sidebar-toggler')
    @endif
</ul>


</nav>
