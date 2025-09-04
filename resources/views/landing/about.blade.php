@extends('layouts.public')

@section('content')
<!-- Header Section -->
<section class="bg-gradient-to-r from-indigo-600 to-purple-600 text-white py-20">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <h1 class="text-5xl font-bold mb-6">
            Sobre Reasy
        </h1>
        <p class="text-xl max-w-3xl mx-auto text-indigo-100">
            Simplificamos la gestión de reservas para que puedas enfocarte en lo que realmente importa: hacer crecer tu negocio.
        </p>
    </div>
</section>

<!-- Mission Section -->
<section class="py-20 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
            <div>
                <h2 class="text-4xl font-bold text-gray-900 mb-6">Nuestra Misión</h2>
                <p class="text-lg text-gray-600 mb-6">
                    En Reasy, creemos que gestionar las reservas de un negocio no debería ser complicado. 
                    Nuestro objetivo es proporcionar herramientas intuitivas y potentes que permitan a los 
                    propietarios de negocios optimizar sus operaciones y brindar mejores experiencias a sus clientes.
                </p>
                <p class="text-lg text-gray-600 mb-8">
                    Desde pequeños salones de belleza hasta grandes cadenas de clínicas, ayudamos a negocios 
                    de todos los tamaños a automatizar sus procesos, reducir ausencias y maximizar su rentabilidad.
                </p>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div class="flex items-center">
                        <div class="w-12 h-12 bg-indigo-100 rounded-lg flex items-center justify-center mr-4">
                            <svg class="w-6 h-6 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" />
                            </svg>
                        </div>
                        <div>
                            <h3 class="font-semibold text-gray-900">Simplicidad</h3>
                            <p class="text-gray-600 text-sm">Fácil de usar desde el primer día</p>
                        </div>
                    </div>
                    <div class="flex items-center">
                        <div class="w-12 h-12 bg-indigo-100 rounded-lg flex items-center justify-center mr-4">
                            <svg class="w-6 h-6 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z" />
                            </svg>
                        </div>
                        <div>
                            <h3 class="font-semibold text-gray-900">Confiabilidad</h3>
                            <p class="text-gray-600 text-sm">99.9% uptime garantizado</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="bg-gray-100 rounded-2xl p-8 h-96 flex items-center justify-center">
                <span class="text-gray-500">Imagen de nuestra misión</span>
            </div>
        </div>
    </div>
</section>

<!-- Story Section -->
<section class="py-20 bg-gray-50">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16">
            <h2 class="text-4xl font-bold text-gray-900 mb-4">Nuestra Historia</h2>
            <p class="text-xl text-gray-600">Cómo comenzó todo</p>
        </div>

        <div class="space-y-12">
            <div class="flex items-start">
                <div class="w-12 h-12 bg-indigo-600 rounded-full flex items-center justify-center mr-6 flex-shrink-0">
                    <span class="text-white font-bold">2020</span>
                </div>
                <div>
                    <h3 class="text-xl font-semibold text-gray-900 mb-2">El Problema</h3>
                    <p class="text-gray-600">
                        Todo comenzó cuando nuestro fundador, propietario de una pequeña clínica dental, 
                        se frustró con los sistemas existentes de gestión de citas. Eran demasiado complejos, 
                        caros y no se adaptaban a las necesidades reales de los pequeños negocios.
                    </p>
                </div>
            </div>

            <div class="flex items-start">
                <div class="w-12 h-12 bg-indigo-600 rounded-full flex items-center justify-center mr-6 flex-shrink-0">
                    <span class="text-white font-bold">2021</span>
                </div>
                <div>
                    <h3 class="text-xl font-semibold text-gray-900 mb-2">La Solución</h3>
                    <p class="text-gray-600">
                        Decidimos crear nuestra propia solución. Después de meses de desarrollo y pruebas 
                        con otros propietarios de negocios, lanzamos la primera versión de Reasy. 
                        Simple, efectiva y asequible.
                    </p>
                </div>
            </div>

            <div class="flex items-start">
                <div class="w-12 h-12 bg-indigo-600 rounded-full flex items-center justify-center mr-6 flex-shrink-0">
                    <span class="text-white font-bold">2023</span>
                </div>
                <div>
                    <h3 class="text-xl font-semibold text-gray-900 mb-2">El Crecimiento</h3>
                    <p class="text-gray-600">
                        Más de 500 negocios confiaron en nosotros. Expandimos nuestras funcionalidades 
                        basándonos en feedback real de usuarios reales. Añadimos integraciones, 
                        reportes avanzados y soporte multi-ubicación.
                    </p>
                </div>
            </div>

            <div class="flex items-start">
                <div class="w-12 h-12 bg-indigo-600 rounded-full flex items-center justify-center mr-6 flex-shrink-0">
                    <span class="text-white font-bold">2025</span>
                </div>
                <div>
                    <h3 class="text-xl font-semibold text-gray-900 mb-2">El Futuro</h3>
                    <p class="text-gray-600">
                        Hoy, más de 1,000 negocios utilizan Reasy diariamente. Seguimos innovando 
                        con IA para predicciones de demanda, automatización avanzada y nuevas 
                        integraciones que hacen la gestión de reservas aún más eficiente.
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Values Section -->
<section class="py-20 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16">
            <h2 class="text-4xl font-bold text-gray-900 mb-4">Nuestros Valores</h2>
            <p class="text-xl text-gray-600">Los principios que guían todo lo que hacemos</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <div class="text-center p-6">
                <div class="w-16 h-16 bg-indigo-100 rounded-full flex items-center justify-center mx-auto mb-4">
                    <svg class="w-8 h-8 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                    </svg>
                </div>
                <h3 class="text-xl font-semibold text-gray-900 mb-3">Centrados en el Cliente</h3>
                <p class="text-gray-600">
                    Cada decisión que tomamos tiene en cuenta las necesidades reales de nuestros usuarios. 
                    Su éxito es nuestro éxito.
                </p>
            </div>

            <div class="text-center p-6">
                <div class="w-16 h-16 bg-indigo-100 rounded-full flex items-center justify-center mx-auto mb-4">
                    <svg class="w-8 h-8 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z" />
                    </svg>
                </div>
                <h3 class="text-xl font-semibold text-gray-900 mb-3">Innovación Constante</h3>
                <p class="text-gray-600">
                    Nunca dejamos de mejorar. Investigamos constantemente nuevas tecnologías y 
                    métodos para hacer Reasy aún mejor.
                </p>
            </div>

            <div class="text-center p-6">
                <div class="w-16 h-16 bg-indigo-100 rounded-full flex items-center justify-center mx-auto mb-4">
                    <svg class="w-8 h-8 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                    </svg>
                </div>
                <h3 class="text-xl font-semibold text-gray-900 mb-3">Transparencia</h3>
                <p class="text-gray-600">
                    Somos honestos en nuestras comunicaciones, transparentes en nuestros precios 
                    y claros en nuestras políticas.
                </p>
            </div>
        </div>
    </div>
</section>

<!-- Team Section -->
<section class="py-20 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16">
            <h2 class="text-4xl font-bold text-gray-900 mb-4">Nuestro Equipo</h2>
            <p class="text-xl text-gray-600">Las personas que hacen posible Reasy</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <!-- Team Member 1 -->
            <div class="bg-white rounded-xl p-6 text-center shadow-sm">
                <div class="w-24 h-24 bg-gray-200 rounded-full mx-auto mb-4"></div>
                <h3 class="text-lg font-semibold text-gray-900 mb-1">María González</h3>
                <p class="text-indigo-600 mb-3">CEO & Fundadora</p>
                <p class="text-gray-600 text-sm">
                    Ex-propietaria de clínica dental, María entiende perfectamente los desafíos 
                    de gestionar un negocio basado en citas.
                </p>
            </div>

            <!-- Team Member 2 -->
            <div class="bg-white rounded-xl p-6 text-center shadow-sm">
                <div class="w-24 h-24 bg-gray-200 rounded-full mx-auto mb-4"></div>
                <h3 class="text-lg font-semibold text-gray-900 mb-1">Carlos Ruiz</h3>
                <p class="text-indigo-600 mb-3">CTO</p>
                <p class="text-gray-600 text-sm">
                    Con más de 15 años en desarrollo de software, Carlos lidera nuestro 
                    equipo técnico con pasión por la excelencia.
                </p>
            </div>

            <!-- Team Member 3 -->
            <div class="bg-white rounded-xl p-6 text-center shadow-sm">
                <div class="w-24 h-24 bg-gray-200 rounded-full mx-auto mb-4"></div>
                <h3 class="text-lg font-semibold text-gray-900 mb-1">Ana López</h3>
                <p class="text-indigo-600 mb-3">Head of Customer Success</p>
                <p class="text-gray-600 text-sm">
                    Ana se asegura de que cada cliente obtenga el máximo valor de Reasy 
                    y tenga una experiencia excepcional.
                </p>
            </div>
        </div>
    </div>
</section>

<!-- Stats Section -->
<section class="py-20 bg-indigo-600">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16">
            <h2 class="text-4xl font-bold text-white mb-4">Reasy en Números</h2>
            <p class="text-xl text-indigo-100">El impacto que hemos logrado juntos</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-4 gap-8 text-center">
            <div>
                <div class="text-5xl font-bold text-white mb-2">1,000+</div>
                <div class="text-indigo-100">Negocios activos</div>
            </div>
            <div>
                <div class="text-5xl font-bold text-white mb-2">50,000+</div>
                <div class="text-indigo-100">Citas gestionadas/mes</div>
            </div>
            <div>
                <div class="text-5xl font-bold text-white mb-2">99.9%</div>
                <div class="text-indigo-100">Uptime garantizado</div>
            </div>
            <div>
                <div class="text-5xl font-bold text-white mb-2">4.8/5</div>
                <div class="text-indigo-100">Satisfacción del cliente</div>
            </div>
        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="py-20 bg-white">
    <div class="max-w-4xl mx-auto text-center px-4 sm:px-6 lg:px-8">
        <h2 class="text-4xl font-bold text-gray-900 mb-6">
            ¿Listo para formar parte de la familia Reasy?
        </h2>
        <p class="text-xl text-gray-600 mb-8">
            Únete a miles de negocios que ya confían en nosotros para gestionar sus reservas.
        </p>
        <a href="{{ route('landing.signup') }}" 
           class="bg-indigo-600 text-white px-8 py-4 rounded-lg font-semibold text-lg hover:bg-indigo-700 transition duration-300 inline-block">
            Comenzar Prueba Gratuita
        </a>
    </div>
</section>
@endsection
