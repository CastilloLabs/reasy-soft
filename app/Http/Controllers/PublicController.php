<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;

final class PublicController extends Controller {
   /**
    * Página de inicio del landing público.
    */
   public function home(): View {
      return view('public.home', [
         'title' => 'Reasy - Sistema de Gestión de Reservas',
         'description' => 'Simplifica la gestión de reservas de tu negocio con Reasy. Automatiza citas, optimiza recursos y mejora la experiencia de tus clientes.',
      ]);
   }

   /**
    * Página sobre nosotros.
    */
   public function about(): View {
      return view('public.about', [
         'title' => 'Sobre Reasy - Quiénes Somos',
         'description' => 'Conoce la historia y misión de Reasy. Ayudamos a negocios a gestionar sus reservas de manera eficiente.',
      ]);
   }

   /**
    * Página de precios y planes.
    */
   public function pricing(): View {
      $plans = [
         [
            'name' => 'Starter',
            'price' => '€29',
            'period' => 'mes',
            'description' => 'Perfecto para pequeños negocios',
            'features' => [
               'Hasta 2 ubicaciones',
               'Hasta 5 servicios',
               'Calendario básico',
               'Notificaciones por email',
               'Soporte por email',
            ],
            'popular' => false,
         ],
         [
            'name' => 'Professional',
            'price' => '€79',
            'period' => 'mes',
            'description' => 'Para negocios en crecimiento',
            'features' => [
               'Hasta 10 ubicaciones',
               'Servicios ilimitados',
               'Calendario avanzado',
               'Notificaciones SMS',
               'Integraciones',
               'Reportes básicos',
               'Soporte prioritario',
            ],
            'popular' => true,
         ],
         [
            'name' => 'Enterprise',
            'price' => 'Personalizado',
            'period' => '',
            'description' => 'Para grandes organizaciones',
            'features' => [
               'Ubicaciones ilimitadas',
               'API completa',
               'Reportes avanzados',
               'Integración personalizada',
               'Soporte 24/7',
               'Account manager dedicado',
            ],
            'popular' => false,
         ],
      ];

      return view('public.pricing', [
         'title' => 'Precios - Reasy',
         'description' => 'Descubre nuestros planes flexibles que se adaptan a las necesidades de tu negocio.',
         'plans' => $plans,
      ]);
   }

   /**
    * Página de características.
    */
   public function features(): View {
      $features = [
         [
            'icon' => 'calendar',
            'title' => 'Gestión de Citas',
            'description' => 'Calendario intuitivo para gestionar todas tus reservas de manera eficiente.',
         ],
         [
            'icon' => 'users',
            'title' => 'Gestión de Clientes',
            'description' => 'Base de datos completa de clientes con historial de reservas y preferencias.',
         ],
         [
            'icon' => 'bell',
            'title' => 'Notificaciones Automáticas',
            'description' => 'Recordatorios automáticos por email y SMS para reducir ausencias.',
         ],
         [
            'icon' => 'chart-bar',
            'title' => 'Reportes y Analytics',
            'description' => 'Insights detallados sobre el rendimiento de tu negocio.',
         ],
         [
            'icon' => 'shield-check',
            'title' => 'Seguridad Avanzada',
            'description' => 'Protección de datos y cumplimiento con RGPD.',
         ],
         [
            'icon' => 'device-mobile',
            'title' => 'Acceso Móvil',
            'description' => 'Gestiona tu negocio desde cualquier dispositivo, en cualquier momento.',
         ],
      ];

      return view('public.features', [
         'title' => 'Características - Reasy',
         'description' => 'Descubre todas las funcionalidades que Reasy ofrece para optimizar tu negocio.',
         'features' => $features,
      ]);
   }

   /**
    * Página de contacto.
    */
   public function contact(): View {
      return view('public.contact', [
         'title' => 'Contacto - Reasy',
         'description' => 'Ponte en contacto con nuestro equipo. Estamos aquí para ayudarte.',
      ]);
   }

   /**
    * Procesar formulario de contacto.
    */
   public function contactSubmit(Request $request) {
      $request->validate([
         'name' => 'required|string|max:255',
         'email' => 'required|email|max:255',
         'company' => 'nullable|string|max:255',
         'message' => 'required|string|max:2000',
      ]);

      // TODO: Implementar envío de email de contacto
      // ContactFormSubmitted::dispatch($request->validated());

      return back()->with('success', 'Gracias por tu mensaje. Te contactaremos pronto.');
   }

   /**
    * Página de registro.
    */
   public function signup(): View {
      return view('public.signup', [
         'title' => 'Crear Cuenta - Reasy',
         'description' => 'Comienza tu prueba gratuita de 30 días. No se requiere tarjeta de crédito.',
      ]);
   }

   /**
    * Términos de servicio.
    */
   public function terms(): View {
      return view('public.legal.terms', [
         'title' => 'Términos de Servicio - Reasy',
         'description' => 'Términos y condiciones de uso de la plataforma Reasy.',
      ]);
   }

   /**
    * Política de privacidad.
    */
   public function privacy(): View {
      return view('public.legal.privacy', [
         'title' => 'Política de Privacidad - Reasy',
         'description' => 'Cómo recopilamos, usamos y protegemos tu información personal.',
      ]);
   }
}
