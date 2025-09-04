---
applyTo: "**"
---

# **Guía para el Agente de IA del Proyecto Reasy**

## **1. Resumen del Proyecto y Stack Tecnológico**

Eres un asistente experto en el desarrollo de la aplicación **Reasy**, un SaaS de gestión de reservas.
Debes generar código limpio, mantenible y que respete la arquitectura modular establecida.

-   **Framework Principal:** Laravel 12
-   **Frontend:** Livewire 3 + Alpine.js (NO React, NO Vue)
-   **Arquitectura:** Monolito Modular con principios de Domain-Driven Design (DDD pragmático)
-   **Base de Datos:** PostgreSQL
-   **Entorno de Desarrollo:** Laravel Sail (Docker)
-   **Estilo de Código:** PSR-12, formateado con Laravel Pint
-   **Pruebas:** PestPHP (por simplicidad y legibilidad)

---

## **2. Arquitectura DDD y Estructura de Directorios**

El código se organiza en **Contextos Delimitados (Bounded Contexts)** dentro de `app/`.
Cada contexto (`app/Booking`, `app/Payments`, `app/Tenants`, etc.) tiene tres capas principales.

**Regla de Oro:**
La lógica de negocio **vive en la Capa de Dominio**. Las demás capas solo la orquestan o la exponen.

### **2.1. Capa de Dominio (`app/{Context}/Domain`)**

-   **Qué es:** El corazón de la lógica de negocio.
-   **Componentes:**

    -   **Aggregates (`/Aggregates`)**: Entidades principales (generalmente modelos Eloquent).

        -   ⚠ Se permite usar Eloquent, pero:

            -   No usar helpers mágicos (`fill`, `update`) dentro del dominio.
            -   La lógica debe estar expresada en métodos explícitos:
                `cancelBooking()`, `applyDiscount()`, etc.

    -   **Value Objects (`/ValueObjects`)**: Clases inmutables (`Money`, `EmailAddress`, `TimeRange`).
    -   **Domain Services (`/Services`)**: Lógica compleja que no cabe en un solo Aggregate (ej: `AvailabilityEngine`).
    -   **Repositories (`/Repositories`)**: Interfaces PHP con métodos claros (`find`, `save`).
    -   **Domain Events (`/Events`)**: Clases de eventos (nombrados en pasado: `BookingWasConfirmed`).

### **2.2. Capa de Aplicación (`app/{Context}/Application`)**

-   **Qué es:** Orquestador de casos de uso. No contiene lógica de negocio.
-   **Componentes:**

    -   **Application Services (`/Services`)**: Ejecutan casos de uso.

        -   Inyectan repositorios.
        -   Obtienen aggregates.
        -   Llaman a sus métodos de dominio.
        -   Guardan el resultado.

    -   **DTOs (`/DTOs`)**: Objetos `readonly` para transportar datos.
    -   **Listeners (`/Listeners`)**: Reaccionan a eventos de dominio y disparan efectos secundarios (emails, notificaciones).

        -   Deben implementar `ShouldQueue`.

### **2.3. Capa de Infraestructura (`app/{Context}/Infrastructure`)**

-   **Qué es:** Implementación técnica de contratos y comunicación externa.
-   **Componentes:**

    -   **Repositories (`/Repositories`)**: Implementan las interfaces del dominio usando Eloquent.
    -   **API Clients (`/Clients`)**: Integración con servicios externos (Stripe, Twilio).
    -   **Service Providers (`/Providers`)**: Cada contexto debe registrar sus bindings aquí, no en `AppServiceProvider`.

### **2.4. Capa de Presentación**

-   **Ubicación:** `app/Http/Livewire`, `resources/views`
-   **Componentes:**

    -   **Livewire Components:**

        -   Manejan el estado de UI.
        -   Capturan entrada del usuario.
        -   Llaman al Application Service correspondiente.
        -   Renderizan la vista Blade.

    -   **Regla estricta:** No incluir lógica de negocio en Livewire.

---

## **3. Flujo de Trabajo para Generar Código**

1. **Analiza la petición:** identifica el contexto afectado (`Booking`, `Payments`, `Tenants`).
2. **Crea o ajusta el Dominio:**

    - Métodos en el Aggregate.
    - Nuevos Value Objects o Domain Services si es necesario.
    - Eventos de dominio cuando corresponda.

3. **Crea el Application Service:**

    - En `Application/Services`.
    - Inyecta dependencias en el constructor.
    - Expón un método `execute()` o `__invoke()`.

4. **Integra con Livewire:**

    - En `app/Http/Livewire`.
    - Llama al Application Service desde métodos públicos (`save()`, `update()`).

5. **Escribe pruebas:**

    - **Unit:** para lógica de dominio (rápidas y sin dependencias externas).
    - **Feature:** para Application Services + Livewire (simulan la interacción del usuario).

---

## **4. Ejemplo de Flujo**

**Prompt del usuario:** "Crea la funcionalidad para que un Administrador de Negocio pueda desactivar un servicio."

**Proceso:**

1. **Contexto:** `Business`.
2. **Dominio:** en `Service.php`, método `deactivate()`, que actualiza el estado y dispara `ServiceWasDeactivated`.
3. **Aplicación:** `DeactivateService.php` en `Application/Services`.
4. **Infraestructura:** `EloquentServiceRepository` guarda el cambio.
5. **Presentación:** en `ServiceManager.php` (Livewire), método `deactivateService()`.
6. **Pruebas:**

    - Unit test para `Service->deactivate()`.
    - Feature test para `ServiceManager` confirmando que el servicio cambia de estado en DB.

---

## **5. Estándares y Convenciones**

-   **Inyección de Dependencias:** siempre por constructor.
-   **Strict Types:** `declare(strict_types=1);` en todos los archivos.
-   **Retornos tipados:** especificar tipos de retorno y parámetros.
-   **Final Classes:** Application Services y Listeners deben ser `final`.
-   **Conventional Commits:** usar `type(scope): message` (ej: `feat(booking): add service deactivation`).
-   **Evitar Fachadas en Dominio:** no usar `Log::`, `Auth::` ni similares.
-   **Pruebas con PestPHP:** usar su sintaxis clara para unit y feature tests.

---

### **6. Control de Versiones y Flujo de Trabajo Git**

-   **Ramas por funcionalidad:**
    Cada nueva funcionalidad o cambio debe desarrollarse en una rama separada con el formato:

    ```
    feature/{contexto}-{descripcion-corta}
    fix/{contexto}-{descripcion-corta}
    chore/{contexto}-{descripcion-corta}
    ```

    Ejemplo: `feature/booking-cancel-reservation`

-   **Commits con Conventional Commits:**
    Usar el estándar [Conventional Commits](https://www.conventionalcommits.org/):

    ```
    type(scope): mensaje
    ```

    Ejemplo:

    -   `feat(booking): allow business admin to cancel reservations`
    -   `fix(payments): handle stripe webhook retries`
    -   `chore(docs): update installation guide`

-   **Pull Requests:**
    Cada rama debe fusionarse a `main` o `develop` mediante Pull Request, con descripción clara de la funcionalidad.

---

### **7. Documentación del Proyecto**

-   La documentación oficial y extendida se encuentra en:

    ```
    /tmp/docs
    ```

-   Corresponde a los archivos previamente compartidos (`Document.md`, `Requisitos.md`, `Arquitectura.md`).
-   Siempre que se implemente una nueva funcionalidad, validar que se alinee con lo especificado en dichos documentos.

---

**Recuerda:**
Tu principal valor es **mantener la integridad de la arquitectura**.
Si una petición del usuario rompe estas reglas, debes sugerir la forma correcta de implementarla dentro de este paradigma.
