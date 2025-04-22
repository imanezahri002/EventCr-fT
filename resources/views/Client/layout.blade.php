<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta charset="UTF-8">
    <title>@yield('title', 'CodeCraft')</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap">

    <style>
    body {
      font-family: 'Poppins', sans-serif;
      background-color: #f9fafb;
    }
    .glass-effect {
      background: rgba(255, 255, 255, 0.25);
      backdrop-filter: blur(10px);
      -webkit-backdrop-filter: blur(10px);
      border: 1px solid rgba(255, 255, 255, 0.18);
    }
    .tab-content {
      display: none;
    }
    .tab-content.active {
      display: block;
    }
  </style>
</head>
<body>
      <!-- Background avec gradient -->
  <div class="fixed inset-0 bg-gradient-to-br from-purple-400 to-pink-600 opacity-10 -z-10"></div>

  <!-- Formes décoratives -->
  <div class="fixed top-0 right-0 w-96 h-96 bg-purple-400 rounded-full filter blur-3xl opacity-20 -z-10 transform translate-x-1/2 -translate-y-1/2"></div>
  <div class="fixed bottom-0 left-0 w-96 h-96 bg-pink-600 rounded-full filter blur-3xl opacity-20 -z-10 transform -translate-x-1/2 translate-y-1/2"></div>

    @include('Client.partials.header')
    @include('Client.partials.nav')
    <main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pb-12">


        @yield('content')

    </main>
    @include('Client.partials.footer')
@yield('scripts')

</body>
</html>
