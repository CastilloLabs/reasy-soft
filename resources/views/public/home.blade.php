@extends('layouts.public')

@section('content')
    <!-- Hero Section -->
    <section class="bg-gradient-to-r from-indigo-600 to-purple-600 text-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-24">
            <div class="text-center">
                <h1 class="text-5xl font-bold mb-6">
                    Gestiona las reservas de tu negocio
                    <span class="block text-indigo-200">de forma inteligente</span>
                </h1>
                <p class="text-xl mb-8 max-w-3xl mx-auto text-indigo-100">
                    Simplifica la gestión de citas, optimiza recursos y mejora la experiencia de tus clientes con nuestra
                    plataforma todo-en-uno.
                </p>
                <div class="flex flex-col sm:flex-row gap-4 justify-center">
                    <a href="{{ route('public.signup') }}"
                        class="bg-white text-indigo-600 px-8 py-4 rounded-lg font-semibold text-lg hover:bg-gray-50 transition duration-300">
                        Prueba Gratuita 30 Días
                    </a>
                    <a href="{{ route('public.features') }}"
                        class="border-2 border-white text-white px-8 py-4 rounded-lg font-semibold text-lg hover:bg-white hover:text-indigo-600 transition duration-300">
                        Ver Características
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- Features Preview -->
    <section class="py-20 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <h2 class="text-4xl font-bold text-gray-900 mb-4">
                    Todo lo que necesitas para gestionar tu negocio
                </h2>
                <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                    Una plataforma completa diseñada específicamente para negocios que dependen de reservas y citas.
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <!-- Feature 1 -->
                <div class="text-center p-6">
                    <div class="w-16 h-16 bg-indigo-100 rounded-full flex items-center justify-center mx-auto mb-4">
                        <svg class="w-8 h-8 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-900 mb-2">Calendario Inteligente</h3>
                    <p class="text-gray-600">
                        Gestiona todas tus citas en un calendario visual y fácil de usar. Con sincronización automática y
                        recordatorios.
                    </p>
                </div>

                <!-- Feature 2 -->
                <div class="text-center p-6">
                    <div class="w-16 h-16 bg-indigo-100 rounded-full flex items-center justify-center mx-auto mb-4">
                        <svg class="w-8 h-8 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197m13.5-9a2.5 2.5 0 11-5 0 2.5 2.5 0 015 0z" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-900 mb-2">Gestión de Clientes</h3>
                    <p class="text-gray-600">
                        Base de datos completa con historial, preferencias y comunicación automática con tus clientes.
                    </p>
                </div>

                <!-- Feature 3 -->
                <div class="text-center p-6">
                    <div class="w-16 h-16 bg-indigo-100 rounded-full flex items-center justify-center mx-auto mb-4">
                        <svg class="w-8 h-8 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-900 mb-2">Reportes y Analytics</h3>
                    <p class="text-gray-600">
                        Obtén insights valiosos sobre tu negocio con reportes detallados y métricas de rendimiento.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- Social Proof -->
    <section class="py-16 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-bold text-gray-900 mb-4">
                    Confiado por más de 1,000 negocios
                </h2>
                <p class="text-lg text-gray-600">
                    Desde clínicas hasta salones de belleza, Reasy potencia negocios de todo tipo.
                </p>
            </div>

            <!-- Stats -->
            <div class="grid grid-cols-1 md:grid-cols-4 gap-8 text-center">
                <div>
                    <div class="text-4xl font-bold text-indigo-600 mb-2">98%</div>
                    <div class="text-gray-600">Satisfacción del cliente</div>
                </div>
                <div>
                    <div class="text-4xl font-bold text-indigo-600 mb-2">15 min</div>
                    <div class="text-gray-600">Tiempo de configuración</div>
                </div>
                <div>
                    <div class="text-4xl font-bold text-indigo-600 mb-2">40%</div>
                    <div class="text-gray-600">Reducción de ausencias</div>
                </div>
                <div>
                    <div class="text-4xl font-bold text-indigo-600 mb-2">24/7</div>
                    <div class="text-gray-600">Soporte disponible</div>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="py-20 bg-indigo-600">
        <div class="max-w-4xl mx-auto text-center px-4 sm:px-6 lg:px-8">
            <h2 class="text-4xl font-bold text-white mb-6">
                ¿Listo para transformar tu negocio?
            </h2>
            <p class="text-xl text-indigo-100 mb-8">
                Únete a miles de negocios que ya optimizan sus reservas con Reasy.
                Comienza tu prueba gratuita hoy mismo.
            </p>
            <a href="{{ route('public.signup') }}"
                class="bg-white text-indigo-600 px-8 py-4 rounded-lg font-semibold text-lg hover:bg-gray-50 transition duration-300 inline-block">
                Comenzar Prueba Gratuita
            </a>
            <p class="text-indigo-200 text-sm mt-4">
                No se requiere tarjeta de crédito • Configuración en minutos
            </p>
        </div>
    </section>
@endsection
