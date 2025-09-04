# Arquitectura DDD con Bounded Contexts
## Laravel 12 + Livewire + PostgreSQL

> **Versión:** 2.1  
> **Stack:** Laravel 12, Livewire, PostgreSQL  
> **Patrón:** Domain-Driven Design (DDD)  

---

## Estructura de Namespaces

```php
// composer.json
{
    "autoload": {
        "psr-4": {
            "TenantManagement\\": "src/TenantManagement/",
            "BusinessManagement\\": "src/BusinessManagement/",
            "BookingManagement\\": "src/BookingManagement/",
            "PaymentManagement\\": "src/PaymentManagement/",
            "NotificationManagement\\": "src/NotificationManagement/",
            "CustomerManagement\\": "src/CustomerManagement/",
            "ScheduleManagement\\": "src/ScheduleManagement/",
            "ReportingManagement\\": "src/ReportingManagement/",
            "ComplianceManagement\\": "src/ComplianceManagement/",
            "IntegrationManagement\\": "src/IntegrationManagement/"
        }
    }
}
```

---

## Bounded Contexts Definidos

### 1. **TenantManagement** 
**Scope**: Gestión de multi-tenancy, planes, facturación de plataforma

**Descripción**: Maneja toda la lógica relacionada con la gestión de tenants (negocios) en la plataforma SaaS. Controla planes de suscripción, límites, facturación entre plataforma y tenants, y métricas globales.

**Entidades Principales**:
- **Tenant**: Representa un negocio cliente de la plataforma
- **SubscriptionPlan**: Planes disponibles (Starter, Pro, Enterprise)
- **Subscription**: Suscripción activa de un tenant a un plan
- **PlatformInvoice**: Factura de la plataforma hacia el tenant
- **TenantUsage**: Métricas de uso por tenant
- **TenantLimit**: Límites configurados por plan

**Estructura**:
```
src/TenantManagement/
├── Domain/
│   ├── Entities/
│   │   ├── Tenant.php
│   │   ├── SubscriptionPlan.php
│   │   ├── Subscription.php
│   │   ├── PlatformInvoice.php
│   │   ├── TenantUsage.php
│   │   └── TenantLimit.php
│   ├── ValueObjects/
│   │   ├── TenantId.php
│   │   ├── PlanFeatures.php
│   │   └── UsageMetrics.php
│   ├── Events/
│   │   ├── TenantCreated.php
│   │   ├── SubscriptionUpgraded.php
│   │   └── TenantSuspended.php
│   ├── Services/
│   │   ├── TenantProvisioningService.php
│   │   └── BillingCalculationService.php
│   └── Repositories/
│       └── TenantRepositoryInterface.php
├── Application/
│   ├── Commands/
│   ├── Queries/
│   └── Handlers/
└── Infrastructure/
    ├── Repositories/
    ├── Persistence/
    └── Events/
```

---

### 2. **BusinessManagement**
**Scope**: Configuración y gestión de negocios individuales

**Descripción**: Gestiona la configuración interna de cada negocio (tenant). Incluye sedes, servicios, recursos (staff/salas), horarios de trabajo y configuración general del negocio.

**Entidades Principales**:
- **Business**: Información general del negocio
- **Location**: Sedes/ubicaciones del negocio
- **Service**: Servicios ofrecidos por el negocio
- **ServiceCategory**: Categorización de servicios
- **Resource**: Recursos (staff, salas, equipos)
- **BusinessUser**: Empleados del negocio
- **Role**: Roles y permisos dentro del negocio

**Estructura**:
```
src/BusinessManagement/
├── Domain/
│   ├── Entities/
│   │   ├── Business.php
│   │   ├── Location.php
│   │   ├── Service.php
│   │   ├── ServiceCategory.php
│   │   ├── Resource.php
│   │   ├── BusinessUser.php
│   │   └── Role.php
│   ├── ValueObjects/
│   │   ├── BusinessId.php
│   │   ├── Address.php
│   │   ├── ContactInfo.php
│   │   └── ServicePricing.php
│   └── Services/
│       └── BusinessConfigurationService.php
```

---

### 3. **ScheduleManagement**
**Scope**: Gestión de disponibilidad, horarios y slots

**Descripción**: Maneja toda la lógica de scheduling, disponibilidad de recursos, horarios de trabajo, excepciones, vacaciones y generación de slots disponibles para reservas.

**Entidades Principales**:
- **Schedule**: Horario base de un recurso
- **ScheduleException**: Excepciones (vacaciones, feriados)
- **TimeSlot**: Slots específicos de tiempo disponibles
- **Availability**: Vista materializada de disponibilidad
- **WorkingHours**: Horarios de trabajo configurables
- **Holiday**: Días feriados del negocio

**Estructura**:
```
src/ScheduleManagement/
├── Domain/
│   ├── Entities/
│   │   ├── Schedule.php
│   │   ├── ScheduleException.php
│   │   ├── TimeSlot.php
│   │   ├── Availability.php
│   │   ├── WorkingHours.php
│   │   └── Holiday.php
│   ├── ValueObjects/
│   │   ├── TimeRange.php
│   │   ├── RecurrenceRule.php
│   │   └── ScheduleStatus.php
│   ├── Services/
│   │   ├── AvailabilityCalculatorService.php
│   │   ├── SlotGeneratorService.php
│   │   └── ScheduleValidationService.php
│   └── Events/
│       └── AvailabilityChanged.php
```

---

### 4. **BookingManagement**
**Scope**: Gestión completa del ciclo de vida de reservas

**Descripción**: Core del sistema. Maneja creación, modificación, cancelación y estados de las reservas. Incluye lógica de negocio para políticas de cancelación, waitlists, y coordinación con otros contextos.

**Entidades Principales**:
- **Booking**: Reserva principal
- **BookingStatus**: Estados de la reserva
- **CancellationPolicy**: Políticas de cancelación
- **WaitlistEntry**: Entradas en lista de espera
- **BookingNote**: Notas de la reserva
- **BookingHistory**: Historial de cambios

**Estructura**:
```
src/BookingManagement/
├── Domain/
│   ├── Entities/
│   │   ├── Booking.php
│   │   ├── BookingStatus.php
│   │   ├── CancellationPolicy.php
│   │   ├── WaitlistEntry.php
│   │   ├── BookingNote.php
│   │   └── BookingHistory.php
│   ├── ValueObjects/
│   │   ├── BookingId.php
│   │   ├── BookingNumber.php
│   │   ├── CancellationReason.php
│   │   └── RefundAmount.php
│   ├── Services/
│   │   ├── BookingCreationService.php
│   │   ├── CancellationService.php
│   │   ├── ReschedulingService.php
│   │   └── WaitlistService.php
│   ├── Events/
│   │   ├── BookingCreated.php
│   │   ├── BookingCancelled.php
│   │   ├── BookingCompleted.php
│   │   └── BookingRescheduled.php
│   └── Policies/
│       └── BookingPolicy.php
```

---

### 5. **CustomerManagement**
**Scope**: Gestión de clientes y sus datos

**Descripción**: Maneja información de clientes, tanto registrados como guests. Incluye perfiles, historial, preferencias, programa de fidelidad y segmentación para marketing.

**Entidades Principales**:
- **Customer**: Cliente del negocio
- **CustomerProfile**: Perfil detallado del cliente
- **CustomerPreference**: Preferencias del cliente
- **LoyaltyAccount**: Cuenta del programa de fidelidad
- **CustomerSegment**: Segmentación para marketing
- **CustomerNote**: Notas sobre el cliente

**Estructura**:
```
src/CustomerManagement/
├── Domain/
│   ├── Entities/
│   │   ├── Customer.php
│   │   ├── CustomerProfile.php
│   │   ├── CustomerPreference.php
│   │   ├── LoyaltyAccount.php
│   │   ├── CustomerSegment.php
│   │   └── CustomerNote.php
│   ├── ValueObjects/
│   │   ├── CustomerId.php
│   │   ├── Email.php
│   │   ├── PhoneNumber.php
│   │   └── LoyaltyPoints.php
│   ├── Services/
│   │   ├── CustomerRegistrationService.php
│   │   ├── LoyaltyService.php
│   │   └── CustomerSegmentationService.php
│   └── Events/
│       ├── CustomerRegistered.php
│       └── LoyaltyPointsEarned.php
```

---

### 6. **PaymentManagement**
**Scope**: Procesamiento de pagos y transacciones financieras

**Descripción**: Maneja todo lo relacionado con pagos: procesamiento, reembolsos, depósitos, métodos de pago guardados, facturación e integración con proveedores de pago.

**Entidades Principales**:
- **Payment**: Pago realizado
- **PaymentMethod**: Método de pago del cliente
- **Refund**: Reembolso procesado
- **Invoice**: Factura generada
- **Transaction**: Transacción financiera
- **PaymentProvider**: Configuración de proveedores

**Estructura**:
```
src/PaymentManagement/
├── Domain/
│   ├── Entities/
│   │   ├── Payment.php
│   │   ├── PaymentMethod.php
│   │   ├── Refund.php
│   │   ├── Invoice.php
│   │   ├── Transaction.php
│   │   └── PaymentProvider.php
│   ├── ValueObjects/
│   │   ├── PaymentId.php
│   │   ├── Money.php
│   │   ├── PaymentStatus.php
│   │   └── RefundReason.php
│   ├── Services/
│   │   ├── PaymentProcessingService.php
│   │   ├── RefundService.php
│   │   ├── InvoiceGenerationService.php
│   │   └── PaymentProviderService.php
│   ├── Events/
│   │   ├── PaymentProcessed.php
│   │   ├── PaymentFailed.php
│   │   ├── RefundIssued.php
│   │   └── InvoiceGenerated.php
│   └── Policies/
│       └── RefundPolicy.php
```

---

### 7. **NotificationManagement**
**Scope**: Sistema de comunicaciones y notificaciones

**Descripción**: Gestiona todas las comunicaciones del sistema: emails, SMS, push notifications, webhooks. Incluye plantillas, programación de envíos y tracking de entrega.

**Entidades Principales**:
- **Notification**: Notificación individual
- **NotificationTemplate**: Plantillas de notificación
- **NotificationSchedule**: Programación de envíos
- **NotificationChannel**: Canales de comunicación
- **CommunicationPreference**: Preferencias de comunicación
- **NotificationLog**: Log de notificaciones enviadas

**Estructura**:
```
src/NotificationManagement/
├── Domain/
│   ├── Entities/
│   │   ├── Notification.php
│   │   ├── NotificationTemplate.php
│   │   ├── NotificationSchedule.php
│   │   ├── NotificationChannel.php
│   │   ├── CommunicationPreference.php
│   │   └── NotificationLog.php
│   ├── ValueObjects/
│   │   ├── NotificationId.php
│   │   ├── MessageContent.php
│   │   ├── Recipient.php
│   │   └── DeliveryStatus.php
│   ├── Services/
│   │   ├── NotificationService.php
│   │   ├── TemplateRenderingService.php
│   │   ├── SchedulingService.php
│   │   └── ChannelDispatcherService.php
│   └── Events/
│       ├── NotificationSent.php
│       ├── NotificationDelivered.php
│       └── NotificationFailed.php
```

---

### 8. **ReportingManagement**
**Scope**: Analytics, reportes y métricas de negocio

**Descripción**: Genera reportes, dashboards y métricas tanto para administradores de plataforma como para negocios individuales. Incluye KPIs, tendencias y análisis predictivo.

**Entidades Principales**:
- **Report**: Reporte generado
- **Dashboard**: Dashboard configurado
- **Metric**: Métrica individual
- **KPI**: Indicador clave de performance
- **ReportSchedule**: Programación de reportes
- **DataExport**: Exportación de datos

**Estructura**:
```
src/ReportingManagement/
├── Domain/
│   ├── Entities/
│   │   ├── Report.php
│   │   ├── Dashboard.php
│   │   ├── Metric.php
│   │   ├── KPI.php
│   │   ├── ReportSchedule.php
│   │   └── DataExport.php
│   ├── ValueObjects/
│   │   ├── ReportId.php
│   │   ├── MetricValue.php
│   │   ├── DateRange.php
│   │   └── FilterCriteria.php
│   ├── Services/
│   │   ├── ReportGenerationService.php
│   │   ├── MetricCalculationService.php
│   │   ├── DashboardService.php
│   │   └── DataExportService.php
│   └── Queries/
│       ├── BookingAnalyticsQuery.php
│       ├── RevenueAnalyticsQuery.php
│       └── CustomerAnalyticsQuery.php
```

---

### 9. **ComplianceManagement**
**Scope**: Cumplimiento regulatorio, auditoría y privacidad

**Descripción**: Maneja todos los aspectos de compliance: GDPR, auditoría, logs inmutables, gestión de privacidad, retención de datos y solicitudes de eliminación.

**Entidades Principales**:
- **AuditLog**: Registro de auditoría
- **ComplianceRequest**: Solicitudes GDPR/CCPA
- **DataRetentionPolicy**: Políticas de retención
- **PrivacyConsent**: Consentimientos de privacidad
- **ComplianceReport**: Reportes de compliance
- **DataAnonymization**: Proceso de anonimización

**Estructura**:
```
src/ComplianceManagement/
├── Domain/
│   ├── Entities/
│   │   ├── AuditLog.php
│   │   ├── ComplianceRequest.php
│   │   ├── DataRetentionPolicy.php
│   │   ├── PrivacyConsent.php
│   │   ├── ComplianceReport.php
│   │   └── DataAnonymization.php
│   ├── ValueObjects/
│   │   ├── AuditAction.php
│   │   ├── ComplianceStatus.php
│   │   ├── RetentionPeriod.php
│   │   └── ConsentType.php
│   ├── Services/
│   │   ├── AuditService.php
│   │   ├── GDPRService.php
│   │   ├── DataRetentionService.php
│   │   └── AnonymizationService.php
│   └── Events/
│       ├── ComplianceRequestReceived.php
│       ├── DataAnonymized.php
│       └── ConsentUpdated.php
```

---

### 10. **IntegrationManagement**
**Scope**: Integraciones con servicios externos y APIs

**Descripción**: Gestiona integraciones con servicios de terceros: pasarelas de pago, proveedores de SMS/email, calendarios externos, APIs de partners y webhooks.

**Entidades Principales**:
- **Integration**: Integración configurada
- **APIKey**: Claves de API para terceros
- **Webhook**: Webhooks configurados
- **ExternalService**: Servicios externos
- **SyncLog**: Log de sincronización
- **IntegrationConfig**: Configuración de integraciones

**Estructura**:
```
src/IntegrationManagement/
├── Domain/
│   ├── Entities/
│   │   ├── Integration.php
│   │   ├── APIKey.php
│   │   ├── Webhook.php
│   │   ├── ExternalService.php
│   │   ├── SyncLog.php
│   │   └── IntegrationConfig.php
│   ├── ValueObjects/
│   │   ├── IntegrationId.php
│   │   ├── APICredentials.php
│   │   ├── WebhookUrl.php
│   │   └── SyncStatus.php
│   ├── Services/
│   │   ├── IntegrationService.php
│   │   ├── WebhookService.php
│   │   ├── SyncService.php
│   │   └── APIKeyService.php
│   └── Contracts/
│       ├── PaymentProviderInterface.php
│       ├── EmailProviderInterface.php
│       ├── SMSProviderInterface.php
│       └── CalendarProviderInterface.php
```

---

## Estructura de Archivos por Bounded Context

Cada Bounded Context sigue la estructura DDD estándar:

```
src/{BoundedContext}/
├── Domain/
│   ├── Entities/          # Entidades del dominio
│   ├── ValueObjects/      # Objetos de valor
│   ├── Events/           # Eventos del dominio
│   ├── Services/         # Servicios del dominio
│   ├── Repositories/     # Interfaces de repositorios
│   ├── Policies/         # Políticas de negocio
│   └── Exceptions/       # Excepciones específicas del dominio
├── Application/
│   ├── Commands/         # Comandos (CQRS)
│   ├── Queries/          # Consultas (CQRS)
│   ├── Handlers/         # Manejadores de comandos/queries
│   ├── DTOs/            # Data Transfer Objects
│   └── Services/        # Servicios de aplicación
├── Infrastructure/
│   ├── Repositories/     # Implementaciones de repositorios
│   ├── Persistence/      # Modelos de Eloquent
│   ├── Events/          # Listeners de eventos
│   ├── Jobs/            # Jobs de Laravel
│   └── External/        # Servicios externos
└── Presentation/
    ├── Http/
    │   ├── Controllers/  # Controladores Laravel
    │   ├── Requests/     # Form Requests
    │   └── Resources/    # API Resources
    ├── Livewire/        # Componentes Livewire
    └── Console/         # Comandos de consola
```

---

## Comunicación entre Bounded Contexts

### Event-Driven Architecture
Los Bounded Contexts se comunican principalmente a través de eventos del dominio:

```php
// Ejemplo de evento entre contextos
namespace BookingManagement\Domain\Events;

class BookingCreated extends Event
{
    public function __construct(
        public readonly BookingId $bookingId,
        public readonly CustomerId $customerId,
        public readonly PaymentId $paymentId,
        public readonly Money $amount
    ) {}
}

// Listener en otro contexto
namespace NotificationManagement\Infrastructure\Events;

class BookingCreatedListener
{
    public function handle(BookingCreated $event): void
    {
        // Enviar notificación de confirmación
        $this->notificationService->sendBookingConfirmation(
            $event->customerId,
            $event->bookingId
        );
    }
}
```

### Shared Kernel
Para elementos compartidos entre contextos:

```php
// src/Shared/ValueObjects/
Money.php
TenantId.php
CustomerId.php
Email.php
PhoneNumber.php

// src/Shared/Events/
DomainEvent.php
EventDispatcher.php

// src/Shared/Exceptions/
DomainException.php
ValidationException.php
```

Esta estructura DDD con Laravel 12 + Livewire proporciona:

✅ **Separación clara de responsabilidades**  
✅ **Escalabilidad por contexto**  
✅ **Facilidad de testing**  
✅ **Bajo acoplamiento entre contextos**  
✅ **Alto cohesión dentro de cada contexto**  
✅ **Flexibilidad para diferentes equipos de desarrollo**