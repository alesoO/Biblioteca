@extends('adminlte::master')

@php( $dashboard_url = View::getSection('dashboard_url') ?? config('adminlte.dashboard_url', 'home') )

@if (config('adminlte.use_route_url', false))
@php( $dashboard_url = $dashboard_url ? route($dashboard_url) : '' )
@else
@php( $dashboard_url = $dashboard_url ? url($dashboard_url) : '' )
@endif

@section('adminlte_css')
@stack('css')
@yield('css')
@stop

@section('classes_body'){{ ($auth_type ?? 'login') . '-page' }}@stop

@section('body')
<div class="{{ $auth_type ?? 'login' }}-box">

    {{-- Logo --}}
    <div class="{{ $auth_type ?? 'login' }}-logo">
        <a href="{{ $dashboard_url }}">

            {{-- Logo Image --}}
            @if (config('adminlte.auth_logo.enabled', false))
            <img src="{{ asset(config('adminlte.auth_logo.img.path')) }}" alt="{{ config('adminlte.auth_logo.img.alt') }}" @if (config('adminlte.auth_logo.img.class', null)) class="{{ config('adminlte.auth_logo.img.class') }}" @endif @if (config('adminlte.auth_logo.img.width', null)) width="{{ config('adminlte.auth_logo.img.width') }}" @endif @if (config('adminlte.auth_logo.img.height', null)) height="{{ config('adminlte.auth_logo.img.height') }}" @endif>
            @else
            <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="currentColor" class="bi bi-book" viewBox="0 0 16 16" style="vertical-align: text-top;">
                <path d="M1 2.828c.885-.37 2.154-.769 3.388-.893 1.33-.134 2.458.063 3.112.752v9.746c-.935-.53-2.12-.603-3.213-.493-1.18.12-2.37.461-3.287.811V2.828zm7.5-.141c.654-.689 1.782-.886 3.112-.752 1.234.124 2.503.523 3.388.893v9.923c-.918-.35-2.107-.692-3.287-.81-1.094-.111-2.278-.039-3.213.492V2.687zM8 1.783C7.015.936 5.587.81 4.287.94c-1.514.153-3.042.672-3.994 1.105A.5.5 0 0 0 0 2.5v11a.5.5 0 0 0 .707.455c.882-.4 2.303-.881 3.68-1.02 1.409-.142 2.59.087 3.223.877a.5.5 0 0 0 .78 0c.633-.79 1.814-1.019 3.222-.877 1.378.139 2.8.62 3.681 1.02A.5.5 0 0 0 16 13.5v-11a.5.5 0 0 0-.293-.455c-.952-.433-2.48-.952-3.994-1.105C10.413.809 8.985.936 8 1.783z" />
            </svg>
            @endif

            {{-- Logo Label --}}
            <h1 style="display: inline-block; vertical-align: top; margin-left: 10px; text-decoration: none;">Biblioteca</h1>

        </a>
    </div>

    {{-- Card Box --}}
    <div class="card {{ config('adminlte.classes_auth_card', 'card-outline card-primary') }}">

        {{-- Card Header --}}
        @hasSection('auth_header')
        <div class="card-header {{ config('adminlte.classes_auth_header', '') }}">
            <h3 class="card-title float-none text-center">
                @yield('auth_header')
            </h3>
        </div>
        @endif

        {{-- Card Body --}}
        <div class="card-body {{ $auth_type ?? 'login' }}-card-body {{ config('adminlte.classes_auth_body', '') }}">
            @yield('auth_body')
        </div>

        {{-- Card Footer --}}
        @hasSection('auth_footer')
        <div class="card-footer {{ config('adminlte.classes_auth_footer', '') }}">
            @yield('auth_footer')
        </div>
        @endif

    </div>

</div>
@stop

@section('adminlte_js')
@stack('js')
@yield('js')
@stop