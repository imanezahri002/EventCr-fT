<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">

    <title>@yield('title', 'Dashboard Admin')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
    {{-- CSS du template --}}
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    {{-- Par exemple Tailwind, Bootstrap, ou le CSS de ton template --}}
</head>
<body>

    @include('Admin.partials.sidebar')

    <section id="content">

    {{-- Navbar --}}
    @include('Admin.partials.navbar')

    {{-- Sidebar --}}
    @include('Admin.partials.sidebar')

        {{-- Contenu principal --}}

            @yield('content')
    </section>

    {{-- Footer --}}
    @include('Admin.partials.footer')


