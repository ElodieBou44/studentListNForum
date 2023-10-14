<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>{{ config('app.name') }} - @yield('title')</title>
        <!-- Lien CSS de BootStrap -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    </head>
    <body>
    <nav class="navbar navbar-expand-lg bg-light">
        <div class="container-fluid">
            @php $locale = session()->get('locale') @endphp
            <a class="navbar-brand" href="{{ route('site.index') }}">@lang('lang.text_hello') {{ Auth::user() ? explode(' ', Auth::user()->name)[0] : ""}}</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav">
                    @guest 
                        <a class="nav-link" href="{{ route('user.create') }}">@lang('lang.text_register')</a>
                        <a class="nav-link" href="{{ route('login') }}">@lang('lang.text_login')</a>
                    @else
                        <a class="nav-link" href="{{ route('site.index') }}">@lang('lang.text_student_list')</a>
                        <a class="nav-link" href="{{ route('forum.index') }}">Forum</a>
                        <a class="nav-link" href="{{ route('files.index') }}">@lang('lang.text_files')</a>
                        <a class="nav-link" href="{{ route('logout') }}">@lang('lang.text_logout')</a>
                    @endguest
                    <a class="nav-link @if($locale=='en')text-dark @endif" href="{{ route('lang', 'en') }}">En</a>
                    <a class="nav-link @if($locale=='fr')text-dark @endif" href="{{ route('lang', 'fr') }}">Fr</a>
            </div>
            </div>
        </div>
    </nav>
        @if(session('success'))
            <div class="alert alert-info custom-bg-color alert-dismissible fade show mt-5 text-center" role="alert">
                <strong>{{ session('success') }}</strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        @if(!$errors->isEmpty())
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <ul>
                @foreach($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach
                </ul>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        @yield('content')
    </body>
    <footer class="bg-light text-white position-relative">
        <div class="container d-flex justify-content-center align-items-center">
            <p class="text-muted">@lang('lang.text_footer')</p>
        </div>
    </footer>

    <!-- Lien JS de BootStrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
</html>