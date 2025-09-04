@extends('layouts.public')

@section('content')
    <!-- Header Section -->
    <section class="bg-gradient-to-r from-indigo-600 to-purple-600 text-white py-20">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h1 class="text-5xl font-bold mb-6">
                Hablemos de tu Negocio
            </h1>
            <p class="text-xl max-w-3xl mx-auto text-indigo-100">
                Nuestro equipo está aquí para ayudarte a encontrar la mejor solución para tu negocio.
            </p>
        </div>
    </section>

    <!-- Contact Section -->
    <section class="py-20 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12">

                <!-- Contact Form -->
                <div class="bg-gray-50 rounded-2xl p-8">
                    <h2 class="text-3xl font-bold text-gray-900 mb-6">Envíanos un mensaje</h2>

                    @if (session('success'))
                        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-6">
                            {{ session('success') }}
                        </div>
                    @endif

                    <form action="{{ route('landing.contact') }}" method="POST" class="space-y-6">
                        @csrf

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label for="name" class="block text-sm font-medium text-gray-700 mb-2">
                                    Nombre *
                                </label>
                                <input type="text" id="name" name="name" required value="{{ old('name') }}"
                                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 @error('name') border-red-500 @enderror">
                                @error('name')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <div>
                                <label for="email" class="block text-sm font-medium text-gray-700 mb-2">
                                    Email *
                                </label>
                                <input type="email" id="email" name="email" required value="{{ old('email') }}"
                                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 @error('email') border-red-500 @enderror">
                                @error('email')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <div>
                            <label for="company" class="block text-sm font-medium text-gray-700 mb-2">
                                Empresa
                            </label>
                            <input type="text" id="company" name="company" value="{{ old('company') }}"
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 @error('company') border-red-500 @enderror">
                            @error('company')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="subject" class="block text-sm font-medium text-gray-700 mb-2">
                                Asunto
                            </label>
                            <select id="subject" name="subject"
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500">
                                <option value="">Selecciona un tema</option>
                                <option value="sales" {{ old('subject') == 'sales' ? 'selected' : '' }}>Consulta comercial
                                </option>
                                <option value="support" {{ old('subject') == 'support' ? 'selected' : '' }}>Soporte técnico
                                </option>
                                <option value="demo" {{ old('subject') == 'demo' ? 'selected' : '' }}>Solicitar demo
                                </option>
                                <option value="partnership" {{ old('subject') == 'partnership' ? 'selected' : '' }}>
                                    Alianzas estratégicas</option>
                                <option value="other" {{ old('subject') == 'other' ? 'selected' : '' }}>Otro</option>
                            </select>
                        </div>

                        <div>
                            <label for="message" class="block text-sm font-medium text-gray-700 mb-2">
                                Mensaje *
                            </label>
                            <textarea id="message" name="message" rows="6" required
                                placeholder="Cuéntanos sobre tu negocio y cómo podemos ayudarte..."
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 @error('message') border-red-500 @enderror">{{ old('message') }}</textarea>
                            @error('message')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <button type="submit"
                            class="w-full bg-indigo-600 text-white py-3 px-6 rounded-lg font-semibold hover:bg-indigo-700 transition duration-300">
                            Enviar Mensaje
                        </button>
                    </form>
                </div>

                <!-- Contact Information -->
                <div class="space-y-8">
                    <div>
                        <h2 class="text-3xl font-bold text-gray-900 mb-6">Información de Contacto</h2>
                        <p class="text-lg text-gray-600 mb-8">
                            Estamos aquí para ayudarte. Elige la forma que prefieras para contactarnos.
                        </p>
                    </div>

                    <!-- Contact Methods -->
                    <div class="space-y-6">
                        <div class="flex items-start">
                            <div
                                class="w-12 h-12 bg-indigo-100 rounded-lg flex items-center justify-center mr-4 flex-shrink-0">
                                <svg class="w-6 h-6 text-indigo-600" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M3 8l7.89 4.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                                </svg>
                            </div>
                            <div>
                                <h3 class="text-lg font-semibold text-gray-900 mb-1">Email</h3>
                                <p class="text-gray-600">hola@reasy.com</p>
                                <p class="text-sm text-gray-500">Respuesta en menos de 24 horas</p>
                            </div>
                        </div>

                        <div class="flex items-start">
                            <div
                                class="w-12 h-12 bg-indigo-100 rounded-lg flex items-center justify-center mr-4 flex-shrink-0">
                                <svg class="w-6 h-6 text-indigo-600" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                                </svg>
                            </div>
                            <div>
                                <h3 class="text-lg font-semibold text-gray-900 mb-1">Teléfono</h3>
                                <p class="text-gray-600">+34 900 123 456</p>
                                <p class="text-sm text-gray-500">Lunes a Viernes, 9:00 - 18:00</p>
                            </div>
                        </div>

                        <div class="flex items-start">
                            <div
                                class="w-12 h-12 bg-indigo-100 rounded-lg flex items-center justify-center mr-4 flex-shrink-0">
                                <svg class="w-6 h-6 text-indigo-600" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z" />
                                </svg>
                            </div>
                            <div>
                                <h3 class="text-lg font-semibold text-gray-900 mb-1">Chat en Vivo</h3>
                                <p class="text-gray-600">Disponible en la plataforma</p>
                                <p class="text-sm text-gray-500">Respuesta inmediata</p>
                            </div>
                        </div>
                    </div>

                    <!-- Office Info -->
                    <div class="bg-gray-50 rounded-xl p-6 mt-8">
                        <h3 class="text-lg font-semibold text-gray-900 mb-4">Nuestra Oficina</h3>
                        <div class="space-y-2 text-gray-600">
                            <p>Reasy Technologies S.L.</p>
                            <p>Calle Innovación, 123</p>
                            <p>28001 Madrid, España</p>
                        </div>
                    </div>

                    <!-- Response Times -->
                    <div class="bg-indigo-50 rounded-xl p-6">
                        <h3 class="text-lg font-semibold text-gray-900 mb-4">Tiempos de Respuesta</h3>
                        <div class="space-y-3">
                            <div class="flex justify-between">
                                <span class="text-gray-600">Consultas comerciales:</span>
                                <span class="font-semibold text-indigo-600">2-4 horas</span>
                            </div>
                            <div class="flex justify-between">
                                <span class="text-gray-600">Soporte técnico:</span>
                                <span class="font-semibold text-indigo-600">
                                    < 24 horas</span>
                            </div>
                            <div class="flex justify-between">
                                <span class="text-gray-600">Solicitudes de demo:</span>
                                <span class="font-semibold text-indigo-600">Mismo día</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- FAQ Section -->
    <section class="py-20 bg-gray-50">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <h2 class="text-4xl font-bold text-gray-900 mb-4">¿Necesitas ayuda inmediata?</h2>
                <p class="text-xl text-gray-600">Consulta nuestras preguntas frecuentes</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                <div class="bg-white rounded-lg p-6 shadow-sm">
                    <h3 class="text-lg font-semibold text-gray-900 mb-3">¿Cómo funciona la prueba gratuita?</h3>
                    <p class="text-gray-600">
                        Obtienes acceso completo por 30 días. No necesitas tarjeta de crédito para comenzar.
                    </p>
                </div>

                <div class="bg-white rounded-lg p-6 shadow-sm">
                    <h3 class="text-lg font-semibold text-gray-900 mb-3">¿Ofrecen migración de datos?</h3>
                    <p class="text-gray-600">
                        Sí, nuestro equipo te ayuda a migrar tus datos desde tu sistema actual sin costo adicional.
                    </p>
                </div>

                <div class="bg-white rounded-lg p-6 shadow-sm">
                    <h3 class="text-lg font-semibold text-gray-900 mb-3">¿Hay capacitación incluida?</h3>
                    <p class="text-gray-600">
                        Incluimos sesiones de onboarding y capacitación para que tu equipo aproveche al máximo Reasy.
                    </p>
                </div>

                <div class="bg-white rounded-lg p-6 shadow-sm">
                    <h3 class="text-lg font-semibold text-gray-900 mb-3">¿Qué tipo de soporte ofrecen?</h3>
                    <p class="text-gray-600">
                        Soporte por email, chat y teléfono. Planes superiores incluyen soporte prioritario y account
                        manager.
                    </p>
                </div>
            </div>
        </div>
    </section>
@endsection
