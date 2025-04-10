<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Parsley CSS (optional for better styling) -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/parsleyjs@2.9.2/src/parsley.css" />

    <!-- Bootstrap CSS (v5.3) -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans antialiased">
    <div class="min-h-screen bg-gray-100 d-flex">
        <!-- Sidebar -->
        <nav class="bg-white border-end" style="width: 250px;">
            <div class="p-3">
                <h5 class="text-center">{{ config('app.name', 'E-Commerce') }}</h5>
                <ul class="nav flex-column">
                    @if(Auth::check() && Auth::user()->hasRole('admin'))
                        <li class="nav-item">
                            <a class="nav-link active" href="{{ route('admin.dashboard') }}"><i class="bi bi-house"></i>
                                Dashboard</a>
                        </li>
                    @endif
                    @if ((Auth::check() && Auth::user()->hasRole('admin')) || (Auth::check() && Auth::user()->hasRole('product_manager')))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('categories.index') }}"><i class="bi bi-tags"></i>
                                Categories</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('products.index') }}"><i class="bi bi-box"></i> Products</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('documents.index') }}"><i class="bi bi-file-earmark-text"></i> Documents</a>
                        </li>
                    @endif
                    {{-- <li class="nav-item">
                        <a class="nav-link" href="{{ route('orders.index') }}"><i class="bi bi-cart"></i> Orders</a>
                    </li> --}}
                </ul>
            </div>
        </nav>

        <!-- Main Content -->
        <div class="flex-grow-1">
            @include('layouts.navigation')

            <!-- Page Heading -->
            @isset($header)
                <header class="bg-white shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endisset

            <!-- Page Content -->
            <main class="p-4">
                {{ $slot }}
            </main>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/parsleyjs@2.9.2/dist/parsley.min.js"></script>
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

    @stack('scripts')
</body>

</html>
