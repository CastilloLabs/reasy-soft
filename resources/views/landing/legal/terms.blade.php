@extends('layouts.public')

@section('content')
    <!-- Header Section -->
    <section class="bg-gray-900 text-white py-16">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            <h1 class="text-4xl font-bold mb-4">Términos de Servicio</h1>
            <p class="text-gray-300">Última actualización: 3 de septiembre de 2025</p>
        </div>
    </section>

    <!-- Terms Content -->
    <section class="py-16 bg-white">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="prose prose-lg max-w-none">

                <h2>1. Aceptación de los Términos</h2>
                <p>
                    Al acceder y utilizar Reasy ("el Servicio"), usted acepta estar vinculado por estos Términos de Servicio
                    ("Términos"). Si no está de acuerdo con alguna parte de estos términos, no podrá acceder al Servicio.
                </p>

                <h2>2. Descripción del Servicio</h2>
                <p>
                    Reasy es una plataforma SaaS (Software as a Service) que proporciona herramientas de gestión de reservas
                    y citas para negocios. El Servicio incluye, pero no se limita a:
                </p>
                <ul>
                    <li>Sistema de gestión de calendarios y citas</li>
                    <li>Base de datos de clientes</li>
                    <li>Notificaciones automáticas</li>
                    <li>Reportes y analytics</li>
                    <li>Integraciones con servicios terceros</li>
                </ul>

                <h2>3. Registro de Cuenta</h2>
                <p>
                    Para utilizar el Servicio, debe crear una cuenta proporcionando información precisa y completa.
                    Usted es responsable de:
                </p>
                <ul>
                    <li>Mantener la confidencialidad de su contraseña</li>
                    <li>Todas las actividades que ocurran bajo su cuenta</li>
                    <li>Notificar inmediatamente cualquier uso no autorizado</li>
                </ul>

                <h2>4. Planes y Facturación</h2>

                <h3>4.1 Periodo de Prueba</h3>
                <p>
                    Ofrecemos un periodo de prueba gratuito de 30 días. No se requiere información de tarjeta de crédito
                    para comenzar la prueba.
                </p>

                <h3>4.2 Suscripciones de Pago</h3>
                <p>
                    Después del periodo de prueba, el acceso continuado al Servicio requiere una suscripción de pago.
                    Los precios están disponibles en nuestra página de precios y pueden cambiar con previo aviso de 30 días.
                </p>

                <h3>4.3 Cancelación</h3>
                <p>
                    Puede cancelar su suscripción en cualquier momento. La cancelación será efectiva al final del periodo
                    de facturación actual.
                </p>

                <h2>5. Uso Aceptable</h2>
                <p>Usted se compromete a no utilizar el Servicio para:</p>
                <ul>
                    <li>Actividades ilegales o que infrinjan derechos de terceros</li>
                    <li>Transmitir contenido malicioso, spam o virus</li>
                    <li>Intentar acceder no autorizado a nuestros sistemas</li>
                    <li>Revender o redistribuir el Servicio sin autorización</li>
                </ul>

                <h2>6. Propiedad Intelectual</h2>
                <p>
                    El Servicio y todo su contenido, características y funcionalidad son propiedad de Reasy Technologies
                    S.L.
                    y están protegidos por derechos de autor, marcas comerciales y otras leyes de propiedad intelectual.
                </p>

                <h2>7. Protección de Datos</h2>
                <p>
                    El tratamiento de datos personales se rige por nuestra Política de Privacidad, que forma parte integral
                    de estos Términos. Cumplimos con el RGPD y demás normativas de protección de datos aplicables.
                </p>

                <h2>8. Limitación de Responsabilidad</h2>
                <p>
                    En ningún caso Reasy Technologies S.L. será responsable de daños indirectos, incidentales, especiales,
                    consecuenciales o punitivos, incluyendo pérdida de beneficios, datos, uso, buena voluntad u otras
                    pérdidas intangibles.
                </p>

                <h2>9. Disponibilidad del Servicio</h2>
                <p>
                    Nos esforzamos por mantener el Servicio disponible 24/7, pero no garantizamos que el Servicio esté
                    disponible en todo momento. Podemos experimentar interrupciones por mantenimiento, actualizaciones
                    o causas fuera de nuestro control.
                </p>

                <h2>10. Modificaciones de los Términos</h2>
                <p>
                    Nos reservamos el derecho de modificar estos Términos en cualquier momento. Las modificaciones
                    entrarán en vigor inmediatamente después de su publicación en el Servicio. Su uso continuado
                    del Servicio constituye aceptación de los términos modificados.
                </p>

                <h2>11. Terminación</h2>
                <p>
                    Podemos terminar o suspender su cuenta inmediatamente, sin previo aviso o responsabilidad,
                    por cualquier motivo, incluyendo sin limitación si usted incumple los Términos.
                </p>

                <h2>12. Ley Aplicable</h2>
                <p>
                    Estos Términos se regirán e interpretarán de acuerdo con las leyes de España, sin tener en cuenta
                    sus disposiciones sobre conflictos de leyes.
                </p>

                <h2>13. Contacto</h2>
                <p>
                    Si tiene preguntas sobre estos Términos de Servicio, puede contactarnos en:
                </p>
                <ul>
                    <li>Email: legal@reasy.com</li>
                    <li>Dirección: Calle Innovación, 123, 28001 Madrid, España</li>
                    <li>Teléfono: +34 900 123 456</li>
                </ul>

            </div>
        </div>
    </section>

    <!-- Contact CTA -->
    <section class="py-16 bg-gray-50">
        <div class="max-w-4xl mx-auto text-center px-4 sm:px-6 lg:px-8">
            <h2 class="text-3xl font-bold text-gray-900 mb-4">¿Tienes preguntas legales?</h2>
            <p class="text-xl text-gray-600 mb-8">
                Nuestro equipo legal está disponible para resolver cualquier duda.
            </p>
            <a href="{{ route('landing.contact') }}"
                class="bg-indigo-600 text-white px-8 py-3 rounded-lg font-semibold hover:bg-indigo-700 transition duration-300 inline-block">
                Contactar Equipo Legal
            </a>
        </div>
    </section>
@endsection
