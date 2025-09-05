@extends('layouts.public')

@section('content')
    <!-- Header Section -->
    <section class="bg-gradient-to-r from-indigo-600 to-purple-600 text-white py-20">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h1 class="text-5xl font-bold mb-6">
                Comienza tu Prueba Gratuita
            </h1>
            <p class="text-xl max-w-3xl mx-auto text-indigo-100">
                30 días completamente gratis. No se requiere tarjeta de crédito. Configuración en minutos.
            </p>
        </div>
    </section>

    <!-- Benefits Section -->
    <section class="py-16 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8 text-center">
                <div>
                    <div class="w-16 h-16 bg-green-100 rounded-full flex items-center justify-center mx-auto mb-4">
                        <svg class="w-8 h-8 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                        </svg>
                    </div>
                    <h3 class="text-lg font-semibold text-gray-900 mb-2">30 Días Gratis</h3>
                    <p class="text-gray-600">Acceso completo sin restricciones</p>
                </div>

                <div>
                    <div class="w-16 h-16 bg-green-100 rounded-full flex items-center justify-center mx-auto mb-4">
                        <svg class="w-8 h-8 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                        </svg>
                    </div>
                    <h3 class="text-lg font-semibold text-gray-900 mb-2">Sin Tarjeta</h3>
                    <p class="text-gray-600">No pedimos información de pago</p>
                </div>

                <div>
                    <div class="w-16 h-16 bg-green-100 rounded-full flex items-center justify-center mx-auto mb-4">
                        <svg class="w-8 h-8 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M13 10V3L4 14h7v7l9-11h-7z" />
                        </svg>
                    </div>
                    <h3 class="text-lg font-semibold text-gray-900 mb-2">Setup Rápido</h3>
                    <p class="text-gray-600">Tu cuenta lista en menos de 5 minutos</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Signup Form Section -->
    <section class="py-20 bg-white">
        <div class="max-w-2xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="bg-white border border-gray-200 rounded-2xl p-8 shadow-lg">
                <div class="text-center mb-8">
                    <h2 class="text-3xl font-bold text-gray-900 mb-2">Crear tu Cuenta</h2>
                    <p class="text-gray-600">Completa la información básica para comenzar</p>
                </div>

                @livewire('public.tenant-registration-form')

                <!-- Login Link -->
                <div class="text-center mt-6">
                    <p class="text-gray-600">
                        ¿Ya tienes una cuenta?
                        <a href="#" class="text-indigo-600 hover:text-indigo-500 font-medium">Inicia sesión aquí</a>
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- What Happens Next -->
    <section class="py-20 bg-gray-50">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <h2 class="text-3xl font-bold text-gray-900 mb-4">¿Qué sucede después?</h2>
                <p class="text-lg text-gray-600">Te guiamos paso a paso para que empieces rápidamente</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div class="text-center">
                    <div class="w-12 h-12 bg-indigo-600 rounded-full flex items-center justify-center mx-auto mb-4">
                        <span class="text-white font-bold">1</span>
                    </div>
                    <h3 class="text-lg font-semibold text-gray-900 mb-2">Verificación Email</h3>
                    <p class="text-gray-600">
                        Te enviamos un email de confirmación para verificar tu cuenta.
                    </p>
                </div>

                <div class="text-center">
                    <div class="w-12 h-12 bg-indigo-600 rounded-full flex items-center justify-center mx-auto mb-4">
                        <span class="text-white font-bold">2</span>
                    </div>
                    <h3 class="text-lg font-semibold text-gray-900 mb-2">Configuración Inicial</h3>
                    <p class="text-gray-600">
                        Nuestro asistente te ayuda a configurar servicios, horarios y personal.
                    </p>
                </div>

                <div class="text-center">
                    <div class="w-12 h-12 bg-indigo-600 rounded-full flex items-center justify-center mx-auto mb-4">
                        <span class="text-white font-bold">3</span>
                    </div>
                    <h3 class="text-lg font-semibold text-gray-900 mb-2">¡Listo para Usar!</h3>
                    <p class="text-gray-600">
                        Comienza a recibir reservas inmediatamente. Tu equipo recibirá capacitación gratuita.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- Testimonial -->
    <section class="py-20 bg-indigo-600">
        <div class="max-w-4xl mx-auto text-center px-4 sm:px-6 lg:px-8">
            <blockquote class="text-xl text-indigo-100 mb-8">
                "Configurar Reasy fue increíblemente fácil. En menos de 10 minutos ya estaba recibiendo mis primeras
                reservas online.
                El equipo de soporte fue excepcional durante todo el proceso."
            </blockquote>
            <div class="flex items-center justify-center">
                <div class="w-12 h-12 bg-indigo-400 rounded-full mr-4"></div>
                <div class="text-left">
                    <p class="text-white font-semibold">Carmen Rodríguez</p>
                    <p class="text-indigo-200">Propietaria, Estética Carmen</p>
                </div>
            </div>
        </div>
    </section>
@endsection
