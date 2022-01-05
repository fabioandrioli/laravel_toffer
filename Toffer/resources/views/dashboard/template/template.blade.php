@extends('site.template.template')

@section('css', asset('css/dashboard_main.css'))

@section('content')
<main>
    <div class="dashboard">
        <div class="menu-lateral">
            <ul>
                <li><a href="#"></a></li>
            </ul>
        </div>
        <div class="dashboard__body">
            @yield('content')
        </div>
    </div>
</main>
@endsection
