# Reasy

Este documento define la Especificación de Requisitos de Software (ERS) para la plataforma "Reasy", un sistema de Software como Servicio (SaaS) diseñado para la gestión integral de reservas y citas en un entorno multi-empresa (multi-tenant).

El propósito fundamental de este documento es servir como la fuente única de verdad (Single Source of Truth) para todos los stakeholders involucrados en el ciclo de vida del producto. Su objetivo es delinear de manera clara y sin ambigüedades los requisitos funcionales y no funcionales que el sistema debe satisfacer para cumplir con las necesidades del negocio y de sus usuarios.

Para asegurar una comprensión completa y un enfoque centrado en el usuario, los requisitos se han estructurado en torno a los cinco actores clave del ecosistema Reasy:

1.  **Administrador de Plataforma (SaaS Owner)**
2.  **Administrador de Negocio (Tenant Owner)**
3.  **Usuarios de Negocio (Staff/Empleados)**
4.  **Clientes Registrados del Negocio**
5.  **Clientes No Registrados del Negocio (Guest)**


### **1. Administrador de Plataforma (SaaS Owner)**

El propietario de Reasy, cuyo "producto" es la plataforma en sí misma. Sus requisitos se centran en la gestión, el crecimiento y la salud del ecosistema completo.

#### **Requisitos Funcionales (RF)**

*   **RF1.1 - Gestión de Tenants:** El administrador debe poder crear, visualizar, suspender y eliminar cuentas de negocio (tenants) en la plataforma.
*   **RF1.2 - Gestión de Planes de Suscripción:** Debe existir un panel para crear y editar los planes (Starter, Professional, etc.), definiendo sus precios, límites (ej. nº de reservas, nº de usuarios) y características.
*   **RF1.3 - Asignación de Planes:** El administrador debe poder asignar o cambiar manualmente el plan de suscripción de cualquier tenant.
*   **RF1.4 - Dashboard de Plataforma:** Debe tener acceso a un dashboard con métricas de negocio clave (KPIs) a nivel de plataforma:
    *   Ingresos Mensuales Recurrentes (MRR).
    *   Tasa de Abandono (Churn Rate).
    *   Número de Tenants Activos.
    *   Número total de transacciones/reservas en la plataforma.
*   **RF1.5 - Facturación de Plataforma:** Debe poder visualizar el historial de facturación de cada tenant hacia la plataforma, incluyendo facturas y estado de los pagos.
*   **RF1.6 - Configuración Global:** Debe poder configurar ajustes que aplican a toda la plataforma, como integraciones de pago globales (Stripe Connect) y plantillas de email transaccionales por defecto.
*   **RF1.7 - Anuncios y Notificaciones:** Debe tener una herramienta para enviar notificaciones o anuncios a todos los administradores de negocio.

#### **Requisitos No Funcionales (RNF)**

*   **RNF1.1 - Seguridad:** El acceso a este panel debe estar altamente securizado, requiriendo autenticación de dos factores (2FA).
*   **RNF1.2 - Auditabilidad:** Todas las acciones críticas realizadas por el administrador (ej. eliminar un tenant, cambiar un plan) deben quedar registradas en un log de auditoría inmutable.
*   **RNF1.3 - Fiabilidad:** Los datos del dashboard deben ser precisos y actualizarse en tiempo casi real para la toma de decisiones.

---

### **2. Administrador de Negocio (Tenant Owner)**

El cliente de Reasy. Su objetivo es configurar y operar su propio negocio de reservas de la manera más eficiente posible.

#### **Requisitos Funcionales (RF)**

*   **RF2.1 - Configuración del Negocio:** Debe poder configurar el perfil de su negocio: nombre, logo, descripción, dirección, zona horaria y moneda.
*   **RF2.2 - Gestión de Sedes/Ubicaciones:** Si el negocio tiene múltiples locales, debe poder gestionarlos de forma independiente, cada uno con su propia configuración.
*   **RF2.3 - Gestión de Servicios:** Debe poder crear, editar y categorizar los servicios que ofrece, definiendo:
    *   Nombre, descripción y duración.
    *   Capacidad (para clases grupales).
    *   Precio base.
    *   **Política de abono/depósito (ninguno, porcentaje o cantidad fija).**
    *   **Política de cancelación (ej. "reembolso del 100% si se cancela con más de 24h de antelación").**
*   **RF2.4 - Gestión de Recursos:** Debe poder gestionar los recursos que realizan los servicios (personal, salas, equipamiento), asignando qué servicios puede ofrecer cada uno.
*   **RF2.5 - Gestión de Horarios:** Debe tener una interfaz visual (calendario) para definir los horarios de trabajo, días libres y vacaciones de cada recurso.
*   **RF2.6 - Gestión de Usuarios (Empleados):** Debe poder invitar a miembros de su equipo a la plataforma y asignarles roles (ej. recepcionista, profesional) con permisos específicos.
*   **RF2.7 - Panel de Control de Reservas:** Debe poder visualizar todas las reservas de su negocio en una vista de calendario o lista, con capacidad para filtrar, buscar y modificarlas.
*   **RF2.8 - Creación Manual de Reservas:** Debe poder crear una reserva manualmente desde el panel, por ejemplo, para clientes que llaman por teléfono.
*   **RF2.9 - Gestión de Clientes:** Debe tener acceso a una base de datos de sus clientes, con su historial de reservas y datos de contacto.
*   **RF2.10 - Dashboard de Negocio:** Debe tener un dashboard con KPIs relevantes para su negocio: ingresos, tasa de ocupación, reservas por servicio, etc.
*   **RF2.11 - Integración de Pagos:** Debe poder conectar su propia cuenta de Stripe o PayPal para recibir los pagos de sus clientes directamente.
*   **RF2.12 - Personalización de Notificaciones:** Debe poder personalizar el texto y el branding de las notificaciones (email, SMS) que reciben sus clientes.

#### **Requisitos No Funcionales (RNF)**

*   **RNF2.1 - Usabilidad:** La interfaz debe ser intuitiva y fácil de usar, permitiendo a un usuario no técnico configurar su negocio sin necesidad de soporte.
*   **RNF2.2 - Rendimiento:** Las cargas del calendario y los reportes deben ser rápidas, incluso con un gran volumen de datos.
*   **RNF2.3 - Privacidad de Datos:** El sistema debe garantizar que los datos de un tenant (clientes, reservas) estén completamente aislados y sean inaccesibles para otros tenants.

---

### **3. Usuarios de Negocio (Staff/Empleados)**

Los empleados del negocio, como recepcionistas o profesionales. Su foco es la operativa diaria y la gestión de su propia agenda.

#### **Requisitos Funcionales (RF)**

*   **RF3.1 - Vista de Calendario Personal:** Debe poder visualizar su propio calendario de citas por día, semana y mes.
*   **RF3.2 - Gestión de Citas Propias:** Debe poder ver los detalles de sus citas, añadir notas internas y (si tiene permiso) reprogramarlas.
*   **RF3.3 - Gestión del Estado de la Cita:** Debe poder marcar una cita como "Completada" o "No Presentado" (No-Show).
*   **RF3.4 - Gestión de Disponibilidad:** Debe poder (si tiene permiso) bloquear franjas horarias en su calendario para descansos o asuntos personales.
*   **RF3.5 - Notificaciones en Tiempo Real:** Debe recibir notificaciones (visuales o push) cuando se le asigne una nueva reserva o se cancele una existente.

#### **Requisitos No Funcionales (RNF)**

*   **RNF3.1 - Interfaz Responsive (Móvil Primero):** La interfaz debe funcionar perfectamente en dispositivos móviles y tablets, ya que es probable que la usen sobre la marcha.
*   **RNF3.2 - Simplicidad:** Las acciones más comunes deben ser accesibles con el mínimo de clics.

---

### **4. Clientes Registrados del Negocio**

Clientes finales que han creado una cuenta en el portal de reservas del negocio. Buscan conveniencia y una relación a largo plazo.

#### **Requisitos Funcionales (RF)**

*   **RF4.1 - Autenticación:** Debe poder registrarse, iniciar y cerrar sesión, y recuperar su contraseña.
*   **RF4.2 - Perfil de Usuario:** Debe poder ver y editar su información personal (nombre, contacto).
*   **RF4.3 - Flujo de Reserva Simplificado:** Al reservar, sus datos deben autocompletarse.
*   **RF4.4 - Historial de Reservas:** Debe poder ver una lista de sus reservas pasadas y futuras.
*   **RF4.5 - Autogestión de Reservas:** Debe poder cancelar o reprogramar sus próximas reservas, sujeto a la política de cancelación del negocio.
*   **RF4.6 - Gestión de Pagos:** Debe poder guardar de forma segura un método de pago para futuras reservas (checkout en 1-clic).

#### **Requisitos No Funcionales (RNF)**

*   **RNF4.1 - Experiencia de Usuario Fluida:** La navegación por su perfil e historial debe ser rápida y clara.

---

### **5. Clientes No Registrados del Negocio (Guest)**

Clientes finales que realizan una reserva por primera vez o de forma esporádica. Priorizan la rapidez y el mínimo compromiso.

#### **Requisitos Funcionales (RF)**

*   **RF5.1 - Flujo de Reserva sin Cuenta:** Debe poder completar todo el proceso de reserva sin necesidad de crear una contraseña.
*   **RF5.2 - Selección de Servicio y Horario:** Debe poder ver los servicios disponibles y seleccionar una franja horaria libre en un calendario interactivo.
*   **RF5.3 - Entrada de Datos Mínima:** El sistema solo debe solicitar la información esencial para la reserva (nombre, email y/o teléfono).
*   **RF5.4 - Verificación de Contacto:** El sistema debe verificar el email o el teléfono (ej. vía OTP por SMS) para asegurar que el contacto es real y reducir el spam/no-shows.
*   **RF5.5 - Proceso de Pago:** Si se requiere un abono, debe poder introducir los datos de su tarjeta de forma segura para completar la reserva.
*   **RF5.6 - Confirmación y Gestión por Enlace:** Debe recibir una confirmación (email/SMS) con los detalles de su reserva y un enlace único y seguro para poder visualizarla, cancelarla o reprogramarla más tarde.

#### **Requisitos No Funcionales (RNF)**

*   **RNF5.1 - Velocidad:** El widget de reserva debe cargar instantáneamente y el proceso completo debe ser extremadamente rápido y sin fricciones.
*   **RNF5.2 - Claridad:** Todos los pasos, precios y políticas deben mostrarse de forma clara y concisa durante el proceso de reserva.
*   **RNF5.3 - Seguridad en Pagos:** El formulario de pago debe cumplir con los estándares PCI DSS (lo cual se logra fácilmente usando Stripe Elements o similar).
