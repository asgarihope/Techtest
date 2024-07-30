<nav class="navbar navbar-expand-lg bg-dark border-bottom border-body" data-bs-theme="dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="{{url('')}}">
            {{config('app.name')}}
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="#">{{trans('label.home')}}</a>
                </li>

            </ul>
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link " href="{{route('panel.fibonacci')}}">{{trans('label.panel.fibonacci.fibonacci')}}</a>
                </li>
                @if(!\Illuminate\Support\Facades\Auth::check())
                    <li class="nav-item">
                        <a class="nav-link " href="{{route('login')}}">{{trans('label.login')}}</a>
                    </li>
                @else
                    <li class="nav-item">
                        <a class="nav-link " href="{{route('panel.index')}}">{{trans('label.panel.panel')}}</a>
                    </li>
                    <li class="nav-item">
                        <form action="{{route('logout')}}" method="post">
                            @csrf
                            <button type="submit" class="nav-link btn btn-link text-danger">{{trans('label.logout')}}</button>
                        </form>
                    </li>
                @endif</ul>
        </div>
    </div>
</nav>


