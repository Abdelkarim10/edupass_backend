<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="style.css">

    <livewire:styles />
</head>

<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light   shadow p-3 mb-5 " style="height: 100px;background-color:#479BC8;">
            <div class="container">
                <img src="public/assets/Logo/edupass_logo.png" alt="logo" style="height:90px;" style="justify-content:center;">
                <a class="navbar-brand btn" href="/home" style="margin:0 ;padding:15px 0 0 0;">
                    <p style="font-weight:600;font-size:25px;text-shadow:4px 4px 8px #898483 ;"> Dashboard <p>
                </a>

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent" style="display:flex">
                    <!-- Left Side Of Navbar -->




                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
                        @if (Route::has('login'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                        @endif

                        <!-- @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                        @endif -->
                        @else
                        <ul class="navbar-nav me-auto" style="padding-left: 00px; ">
                 
                        <li>
                                <div style="width:25%;height:100%;text-decoration: none;">
                                    <a id="users_section" href="/contact-us" class="btn" style="">
                                        <img src="{{env('url') . 'public/svg/notebook-of-contacts-svgrepo-com.svg'}}" alt="" style="height: 50px;width:50px;">
                                        <p style="font-weight:600;">ContactUs</p>
                                    </a>
                                </div>
                            </li>



                        <li>
                                <div style="width:25%;height:100%;text-decoration: none;">
                                    <a id="users_section" href="/sponsors" class="btn" style="">
                                        <img src="https://www.svgrepo.com/show/8158/user.svg" alt="" style="height: 50px;width:50px;">
                                        <p style="font-weight:600;"> Sponsors</p>
                                    </a>
                                </div>
                            </li>

                            <li>
                                <div style="width:25%;height:100%;text-decoration: none;">
                                    <a id="users_section" href="/partners" class="btn" style="">
                                        <img src="https://www.svgrepo.com/show/8158/user.svg" alt="" style="height: 50px;width:50px;">
                                        <p style="font-weight:600;"> Partners</p>
                                    </a>
                                </div>
                            </li>
                 
                            <li>
                                <div style="width:25%;height:100%;text-decoration: none;">
                                    <a id="users_section" href="/all-users/2" class="btn" style="">
                                        <img src="{{env('url') . 'public/svg/student-svgrepo-com.svg'}}" alt="" style="height: 50px;width:50px;">
                                        <p style="font-weight:600;"> Students</p>
                                    </a>
                                </div>
                            </li>
        
                            <li>
                                <div style="width:25%;height:100%;text-decoration: none;">
                                    <a id="users_section" href="/all-users/1" class="btn" style="">
                                        <img src="{{env('url') . 'public/svg/teacher-svgrepo-com.svg'}}" alt="" style="height: 50px;width:50px;">
                                        <p style="font-weight:600;"> Assistants</p>
                                    </a>
                                </div>
                            </li>

                            <li>
                                <div id="classes_section" style="width:25%;height:100%;text-decoration: none;">
                                    <a href="/grades" class="btn" style="">
                                        <img src="{{env('url') . '/public/svg/class-svgrepo-com.svg'}}" alt="" style="height: 50px;width:50px;">
                                        <p style="font-weight:600;"> Grades</p>
                                    </a>
                                </div>
                            </li>

                            <!-- <li>
                                <div id="courses_section" style="width:25%;height:100%;text-decoration: none;">
                                    <a href="/courses" style="text-decoration: none;color:inherit"><img src="{{url('/svg/books-svgrepo-com.svg')}}" alt="" style="height: 30px;width:30px;"> Courses</a>
                                </div>
                            </li>

                            <li>
                                <div id="assessments_section" style="width:25%;height:100%;text-decoration: none;">
                                    <a href="/assessments" style="text-decoration: none;color:inherit"><img src="{{url('/svg/test-svgrepo-com (1).svg')}}" alt="" style="height: 30px;width:30px;"> Assessments</a>
                                </div>
                            </li>
                            <div id="lessons_section" style="width:25%;height:100%;text-decoration: none;">
                                <a href="/lessons" style="text-decoration: none;color:inherit"><img src="{{url('/svg/test-svgrepo-com (2).svg')}}" alt="" style="height: 45px;width:45px;"> Lessons</a>
                            </div>
                            </li> -->
                        </ul>
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }}
                            </a>

                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>
        <div>
            <main class="py-4">
                @if(Session::has('flash_message'))
                <p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('flash_message') }}</p>
                @endif
                @yield('content')
            </main>
        </div>

    </div>

    <livewire:scripts />
</body>

</html>