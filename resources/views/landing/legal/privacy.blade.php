@extends('layouts.public')

@section('content')
    <!-- Header Section -->
    <section class="bg-gray-900 text-white py-16">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            <h1 class="text-4xl font-bold mb-4">Política de Privacidad</h1>
            <p class="text-gray-300">Última actualización: 3 de septiembre de 2025</p>
        </div>
    </section>

    <!-- Privacy Content -->
    <section class="py-16 bg-white">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="prose prose-lg max-w-none">

                <h2>1. Introducción</h2>
                <p>
                    En Reasy Technologies S.L. ("Reasy", "nosotros", "nuestro"), respetamos su privacidad y estamos
                    comprometidos con la protección de sus datos personales. Esta Política de Privacidad explica cómo
                    recopilamos, utilizamos, compartimos y protegemos su información cuando utiliza nuestro servicio.
                </p>

                <h2>2. Información que Recopilamos</h2>

                <h3>2.1 Información que usted nos proporciona</h3>
                <ul>
                    <li><strong>Información de cuenta:</strong> nombre, email, teléfono, contraseña</li>
                    <li><strong>Información de negocio:</strong> nombre del negocio, sector, dirección</li>
                    <li><strong>Información de facturación:</strong> datos de tarjeta de crédito, dirección de facturación
                    </li>
                    <li><strong>Contenido del usuario:</strong> datos de clientes, citas, notas, configuraciones</li>
                </ul>

                <h3>2.2 Información recopilada automáticamente</h3>
                <ul>
                    <li><strong>Datos de uso:</strong> páginas visitadas, características utilizadas, tiempo de sesión</li>
                    <li><strong>Información del dispositivo:</strong> dirección IP, tipo de navegador, sistema operativo
                    </li>
                    <li><strong>Cookies y tecnologías similares:</strong> para mejorar la experiencia del usuario</li>
                </ul>

                <h2>3. Cómo Utilizamos su Información</h2>
                <p>Utilizamos su información personal para:</p>
                <ul>
                    <li>Proporcionar, mantener y mejorar nuestro servicio</li>
                    <li>Procesar transacciones y enviar confirmaciones</li>
                    <li>Comunicarnos con usted sobre su cuenta o nuestro servicio</li>
                    <li>Proporcionar soporte al cliente</li>
                    <li>Personalizar su experiencia</li>
                    <li>Analizar el uso del servicio para mejoras</li>
                    <li>Prevenir fraude y garantizar la seguridad</li>
                    <li>Cumplir obligaciones legales</li>
                </ul>

                <h2>4. Base Legal para el Tratamiento (RGPD)</h2>
                <p>Procesamos sus datos personales bajo las siguientes bases legales:</p>
                <ul>
                    <li><strong>Ejecución de contrato:</strong> para proporcionar el servicio que ha contratado</li>
                    <li><strong>Interés legítimo:</strong> para mejorar nuestro servicio, seguridad y soporte</li>
                    <li><strong>Consentimiento:</strong> para comunicaciones de marketing (puede retirar el consentimiento)
                    </li>
                    <li><strong>Obligación legal:</strong> para cumplir con requisitos legales y regulatorios</li>
                </ul>

                <h2>5. Compartir Información</h2>
                <p>No vendemos sus datos personales. Podemos compartir su información en las siguientes circunstancias:</p>

                <h3>5.1 Proveedores de servicios</h3>
                <p>Compartimos datos con terceros que nos ayudan a operar nuestro negocio:</p>
                <ul>
                    <li>Procesadores de pagos (Stripe)</li>
                    <li>Proveedores de hosting e infraestructura (AWS)</li>
                    <li>Servicios de análisis (Google Analytics)</li>
                    <li>Proveedores de email y SMS</li>
                    <li>Herramientas de soporte al cliente</li>
                </ul>

                <h3>5.2 Requisitos legales</h3>
                <p>Podemos divulgar información si es requerido por ley o en respuesta a procesos legales válidos.</p>

                <h3>5.3 Protección de derechos</h3>
                <p>Para proteger los derechos, propiedad o seguridad de Reasy, nuestros usuarios o el público.</p>

                <h2>6. Transferencias Internacionales</h2>
                <p>
                    Sus datos pueden ser transferidos y procesados en países fuera del Espacio Económico Europeo.
                    Implementamos salvaguardas apropiadas, como cláusulas contractuales estándar, para proteger sus datos.
                </p>

                <h2>7. Retención de Datos</h2>
                <p>
                    Retenemos sus datos personales durante el tiempo necesario para cumplir los propósitos descritos
                    en esta política, a menos que la ley requiera un período de retención más largo. Cuando cancele
                    su cuenta, eliminaremos sus datos dentro de 90 días, salvo que tengamos una obligación legal de
                    conservarlos.
                </p>

                <h2>8. Seguridad de Datos</h2>
                <p>Implementamos medidas de seguridad técnicas y organizativas apropiadas, incluyendo:</p>
                <ul>
                    <li>Cifrado de datos en tránsito y en reposo</li>
                    <li>Autenticación de dos factores</li>
                    <li>Auditorías de seguridad regulares</li>
                    <li>Acceso limitado basado en roles</li>
                    <li>Monitoreo de seguridad 24/7</li>
                </ul>

                <h2>9. Sus Derechos (RGPD)</h2>
                <p>Bajo el RGPD, usted tiene los siguientes derechos:</p>
                <ul>
                    <li><strong>Acceso:</strong> solicitar una copia de sus datos personales</li>
                    <li><strong>Rectificación:</strong> corregir datos inexactos o incompletos</li>
                    <li><strong>Supresión:</strong> solicitar la eliminación de sus datos</li>
                    <li><strong>Limitación:</strong> restringir el procesamiento de sus datos</li>
                    <li><strong>Portabilidad:</strong> recibir sus datos en formato estructurado</li>
                    <li><strong>Oposición:</strong> oponerse al procesamiento basado en interés legítimo</li>
                    <li><strong>Retirar consentimiento:</strong> para procesamiento basado en consentimiento</li>
                </ul>

                <p>Para ejercer estos derechos, contacte con nosotros en privacy@reasy.com</p>

                <h2>10. Cookies</h2>
                <p>Utilizamos cookies y tecnologías similares para:</p>
                <ul>
                    <li>Mantener su sesión de usuario</li>
                    <li>Recordar sus preferencias</li>
                    <li>Analizar el uso del sitio web</li>
                    <li>Mejorar la seguridad</li>
                </ul>
                <p>Puede controlar las cookies a través de la configuración de su navegador.</p>

                <h2>11. Menores de Edad</h2>
                <p>
                    Nuestro servicio no está dirigido a menores de 16 años. No recopilamos conscientemente
                    información personal de menores de 16 años sin el consentimiento parental verificable.
                </p>

                <h2>12. Cambios en esta Política</h2>
                <p>
                    Podemos actualizar esta Política de Privacidad ocasionalmente. Le notificaremos cambios
                    significativos publicando la nueva política en nuestro sitio web y enviándole un email
                    si los cambios afectan sus derechos de manera sustancial.
                </p>

                <h2>13. Delegado de Protección de Datos</h2>
                <p>
                    Hemos designado un Delegado de Protección de Datos (DPO) que puede contactar en:
                </p>
                <ul>
                    <li>Email: dpo@reasy.com</li>
                    <li>Dirección: Calle Innovación, 123, 28001 Madrid, España</li>
                </ul>

                <h2>14. Autoridad de Control</h2>
                <p>
                    Tiene derecho a presentar una queja ante la Agencia Española de Protección de Datos (AEPD)
                    si considera que el procesamiento de sus datos personales infringe el RGPD.
                </p>
                <ul>
                    <li>Web: www.aepd.es</li>
                    <li>Teléfono: 901 100 099</li>
                </ul>

                <h2>15. Contacto</h2>
                <p>
                    Si tiene preguntas sobre esta Política de Privacidad o nuestras prácticas de datos, contacte con
                    nosotros:
                </p>
                <ul>
                    <li>Email: privacy@reasy.com</li>
                    <li>Dirección: Calle Innovación, 123, 28001 Madrid, España</li>
                    <li>Teléfono: +34 900 123 456</li>
                </ul>

            </div>
        </div>
    </section>

    <!-- Contact CTA -->
    <section class="py-16 bg-gray-50">
        <div class="max-w-4xl mx-auto text-center px-4 sm:px-6 lg:px-8">
            <h2 class="text-3xl font-bold text-gray-900 mb-4">¿Preguntas sobre tus datos?</h2>
            <p class="text-xl text-gray-600 mb-8">
                Nuestro equipo de privacidad está aquí para ayudarte con cualquier consulta sobre tus datos personales.
            </p>
            <a href="mailto:privacy@reasy.com"
                class="bg-indigo-600 text-white px-8 py-3 rounded-lg font-semibold hover:bg-indigo-700 transition duration-300 inline-block">
                Contactar Equipo de Privacidad
            </a>
        </div>
    </section>
@endsection
