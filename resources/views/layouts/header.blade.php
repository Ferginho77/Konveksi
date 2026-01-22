<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>@yield('title', 'Home')</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <!-- Google Fonts: Open Sans -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.8/main.min.css" rel="stylesheet" />
</head>

<body>
    <main>
        <div id="db-wrapper">

            {{-- Sidebar --}}
            @include('layouts.sidebar')
        </div>
        <div class="container">
            @yield('content')
        </div>
    </main>
    {{-- <script>
        document.querySelectorAll('.card').forEach(card => {
            card.addEventListener('click', function(e) {
                let ripple = this.querySelector('::after');
                if (!ripple) return;
                ripple.style.left = `${e.offsetX}px`;
                ripple.style.top = `${e.offsetY}px`;
            });
        });
    </script> --}}

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.8/main.min.js"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
</body>

</html>
