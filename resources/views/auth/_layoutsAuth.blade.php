@extends('layouts.base')

@section('body')

    @include('layouts.common.alerts')

    @yield('auth_body')

@endsection
