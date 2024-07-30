@extends('auth._layoutsAuth')
@section('base_title')
    {{trans('auth.page.login')}}
@endsection

@section('auth_body')
<div class="row justify-content-center">
<div class="col-lg-4">
    <form method="POST" action="{{ route('attemptLogin') }}">
        @csrf
        <label for="email" class="fs-12 text-muted mb-3">{{trans('auth.form.field.email')}}</label>
        <div class="mb-5">
            <input id="email" type="text" class="form-control @error('email') is-invalid @enderror"
                   name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
        </div>


        <label for="mobile" class="fs-12 text-muted mb-3">{{trans('auth.form.field.password')}}</label>
        <div class="mb-5">
            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror"
                   name="password" value="{{ old('password') }}" required autocomplete="password">

        </div>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <button type="submit" class="btn btn-danger fs-16 py-3 w-100">Login</button>
    </form>
</div>
</div>
@endsection
