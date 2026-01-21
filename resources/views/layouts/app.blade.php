<!DOCTYPE html>
<html lang="en">
<head>
    @include('layouts.header')
    <title>@yield('title')</title>
</head>

<body class="bg-light">
<div id="db-wrapper">

    {{-- Sidebar --}}
    @include('layouts.sidebar')

    {{-- Page Content --}}
    <div id="page-content">
        @yield('content')
    </div>

</div>

@include('layouts.scripts')
</body>
</html>
