{{-- resources/views/layouts/app.blade.php --}}
<!DOCTYPE html>
{{-- <html lang="en" dir="ltr" data-bs-theme="light">  --}}
{{-- <html lang="en" dir="ltr"  data-theme="light">  --}}
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" dir="{{ $dir ?? 'ltr' }}">

<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Admin Dashboard')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    {{-- Bootstrap & Icon Fonts --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&display=swap" rel="stylesheet">

    {{-- Core CSS --}}
    

    <link rel="stylesheet" href="{{ asset('assets/css/navbar.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/sidebar.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/main.css') }}">

    {{-- Theme (Light/Dark) and RTL --}}
    <link id="theme-style" rel="stylesheet" href="{{ asset('assets/css/theme-light.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/rtl.css') }}">
</head>
<body>

    <div class="wrapper">

        {{-- Navbar --}}
        <x-navbar />

        {{-- Sidebar + Main --}}
        <div class="content d-flex">
            <x-sidebar />

            {{-- ✅ This main will auto-adjust based on sidebar class --}}
            <main class="main flex-grow-1 p-3">
                @yield('content')
            </main>
        </div>

        {{-- Footer --}}
        <x-footer />
    </div>

    {{-- JS Libraries --}}
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    {{-- Custom JS --}}
    <script src="{{ asset('assets/js/sidebar.js') }}"></script>
    <script src="{{ asset('assets/js/charts.js') }}"></script>
    <script src="{{ asset('assets/js/theme.js') }}"></script>

    {{-- Rotating Language Icon --}}
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const dropdownToggle = document.querySelector('[data-bs-toggle="dropdown"]');
            const icon = document.getElementById('languageIcon');
            dropdownToggle?.addEventListener('click', () => icon?.classList.toggle('rotate'));
            dropdownToggle?.addEventListener('hide.bs.dropdown', () => icon?.classList.remove('rotate'));
        });
    </script>

</body>
</html>
