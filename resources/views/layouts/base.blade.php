@extends('layouts._layout')

@section('base_title')
    @yield('title')
@endsection
@section('base_head')
    @vite(['resources/scss/app.scss'])
    @yield('head')
@endsection
@section("base_body")
    @include('layouts.common.header')
    <div class="container-xl pt-3">
        @yield('body')
    </div>
    @include('layouts.common.footer')
@endsection
@section('base_script')
    @vite(['resources/js/app.js'])
    @include('layouts.common.scripts')
@endsection

