<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ $title ?? 'Reasy - Sistema de Gestión de Reservas' }}</title>
    <meta name="description" content="{{ $description ?? 'Simplifica la gestión de reservas de tu negocio con Reasy.' }}">

    <!-- Favicon -->
    <link rel="icon" href="{{ asset('favicon.ico') }}">
    <link rel="apple-touch-icon" href="{{ asset('apple-touch-icon.png') }}">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=inter:400,500,600,700&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-white font-sans antialiased">
    <!-- Navigation -->
    <nav class="bg-white shadow-sm border-b border-gray-200">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16">
                <div class="flex items-center">
                    <!-- Logo -->
                    <div class="flex-shrink-0">
                        <a href="{{ route('public.home') }}" class="text-2xl font-bold text-indigo-600">
                            Reasy
                        </a>
                    </div>

                    <!-- Navigation Links -->
                    <div class="hidden md:ml-10 md:flex space-x-8">
                        <a href="{{ route('public.features') }}"
                            class="text-gray-600 hover:text-gray-900 px-3 py-2 text-sm font-medium">
                            Características
                        </a>
                        <a href="{{ route('public.pricing') }}"
                            class="text-gray-600 hover:text-gray-900 px-3 py-2 text-sm font-medium">
                            Precios
                        </a>
                        <a href="{{ route('public.about') }}"
                            class="text-gray-600 hover:text-gray-900 px-3 py-2 text-sm font-medium">
                            Sobre Nosotros
                        </a>
                        <a href="{{ route('public.contact') }}"
                            class="text-gray-600 hover:text-gray-900 px-3 py-2 text-sm font-medium">
                            Contacto
                        </a>
                    </div>
                </div>

                <!-- Right Side -->
                <div class="flex items-center space-x-4">
                    <a href="#" class="text-gray-600 hover:text-gray-900 px-3 py-2 text-sm font-medium">
                        Iniciar Sesión
                    </a>
                    <a href="{{ route('public.signup') }}"
                        class="bg-indigo-600 hover:bg-indigo-700 text-white px-4 py-2 rounded-md text-sm font-medium">
                        Prueba Gratuita
                    </a>
                </div>

                <!-- Mobile menu button -->
                <div class="md:hidden flex items-center">
                    <button type="button"
                        class="text-gray-600 hover:text-gray-900 focus:outline-none focus:text-gray-900"
                        x-data="{ open: false }" @click="open = !open">
                        <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4 6h16M4 12h16M4 18h16" />
                        </svg>
                    </button>
                </div>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <main>
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="bg-gray-50 border-t border-gray-200">
        <div class="max-w-7xl mx-auto py-12 px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
                <!-- Company -->
                <div>
                    <h3 class="text-lg font-semibold text-gray-900 mb-4">Reasy</h3>
                    <p class="text-gray-600 text-sm">
                        Simplifica la gestión de reservas de tu negocio con nuestra plataforma intuitiva y potente.
                    </p>
                </div>

                <!-- Product -->
                <div>
                    <h4 class="text-sm font-semibold text-gray-900 mb-4">Producto</h4>
                    <ul class="space-y-2">
                        <li><a href="{{ route('public.features') }}"
                                class="text-gray-600 hover:text-gray-900 text-sm">Características</a></li>
                        <li><a href="{{ route('public.pricing') }}"
                                class="text-gray-600 hover:text-gray-900 text-sm">Precios</a></li>
                        <li><a href="#" class="text-gray-600 hover:text-gray-900 text-sm">Integraciones</a></li>
                        <li><a href="#" class="text-gray-600 hover:text-gray-900 text-sm">API</a></li>
                    </ul>
                </div>

                <!-- Company -->
                <div>
                    <h4 class="text-sm font-semibold text-gray-900 mb-4">Empresa</h4>
                    <ul class="space-y-2">
                        <li><a href="{{ route('public.about') }}"
                                class="text-gray-600 hover:text-gray-900 text-sm">Sobre Nosotros</a></li>
                        <li><a href="{{ route('public.contact') }}"
                                class="text-gray-600 hover:text-gray-900 text-sm">Contacto</a></li>
                        <li><a href="#" class="text-gray-600 hover:text-gray-900 text-sm">Blog</a></li>
                        <li><a href="#" class="text-gray-600 hover:text-gray-900 text-sm">Carreras</a></li>
                    </ul>
                </div>

                <!-- Legal -->
                <div>
                    <h4 class="text-sm font-semibold text-gray-900 mb-4">Legal</h4>
                    <ul class="space-y-2">
                        <li><a href="{{ route('public.privacy') }}"
                                class="text-gray-600 hover:text-gray-900 text-sm">Privacidad</a></li>
                        <li><a href="{{ route('public.terms') }}"
                                class="text-gray-600 hover:text-gray-900 text-sm">Términos</a></li>
                        <li><a href="#" class="text-gray-600 hover:text-gray-900 text-sm">Cookies</a></li>
                    </ul>
                </div>
            </div>

            <div class="mt-8 pt-8 border-t border-gray-200">
                <p class="text-center text-gray-600 text-sm">
                    &copy; {{ date('Y') }} Reasy. Todos los derechos reservados.
                </p>
            </div>
        </div>
    </footer>
</body>

</html>
