# RLO - Rocket League Objetos

Proyecto Intermodular de Desarrollo de Aplicaciones Web (2º DAW).

**RLO** es una plataforma web integral dedicada al ecosistema del videojuego Rocket League. La aplicación combina funcionalidades de tienda de objetos virtuales, gestión de inventario personal y un portal de noticias, diseñada para suplir el vacío actual de bases de datos de objetos y conectar a la comunidad.

---

## Vistas de la Aplicacion

| Pantalla de Inicio | Inventario Dinamico |
| :---: | :---: |
| ![Inicio](Página%20web/imagenes/captura-inicio.png) | ![Inventario](Página%20web/imagenes/captura-inventario.png) |

| Tienda y Carrito | Portal de Noticias |
| :---: | :---: |
| ![Tienda](Página%20web/imagenes/captura-tienda.png) | ![Noticias](Página%20web/imagenes/captura-noticias.png) |

---

## Caracteristicas Principales

* **Tienda Dinamica:** Catálogo de objetos con integración de carrito de compras y validación de estado de posesión de los ítems ("En posesión").
* **Garaje / Inventario:** Herramienta avanzada de visualización con filtrado múltiple y ordenación en tiempo real (por rareza o alfabético) sin recarga de página.
* **Portal de Noticias:** Sistema interactivo basado en tarjetas con despliegue progresivo de información (carga asíncrona).
* **Transacciones Seguras:** Procesamiento de compras mediante transacciones SQL atómicas para garantizar la integridad de los créditos del usuario.
* **Autenticacion:** Sistema de registro y login de usuarios con cifrado seguro de contraseñas (`password_hash`).

---

## Tecnologias y Arquitectura

El proyecto sigue una arquitectura clásica Cliente-Servidor (Full-Stack), separando estrictamente la interfaz gráfica de la lógica de negocio y el acceso a los datos.

### Frontend (Cliente)
* **HTML5:** Marcado semántico (`<header>`, `<nav>`, `<main>`, `<footer>`) para optimizar accesibilidad y SEO.
* **CSS3:** Diseño adaptativo (Mobile First) empleando CSS Grid, Flexbox y arquitectura modular.
* **JavaScript (Vanilla JS):**
  * Manipulación dinámica del DOM y Modales UI personalizados.
  * Consumo de la API Backend (endpoints PHP) mediante Fetch API.
  * Gestión del estado del carrito y persistencia de datos mediante LocalStorage.

### Backend (Servidor)
* **PHP (v7.4+):** Controlador de la lógica de negocio, manejo de sesiones de usuario y creación de Endpoints REST para procesar peticiones asíncronas en formato JSON.
* **MariaDB (MySQL):** Base de datos relacional normalizada.
* **Seguridad:** Abstracción PDO implementando consultas preparadas (Prepared Statements) para prevenir ataques de inyección SQL.

---

## Modelo de Datos (Diagrama Entidad-Relacion)

La persistencia se organiza en cuatro entidades centrales integrando relaciones 1:N y N:M.

![Esquema SQL](Página%20web/imagenes/diagrama-sql.png) 

---

## Estructura del Proyecto

    TFC
     ┣ config
     ┃ ┗ db.php                 # Conexion a la base de datos (PDO)
     ┣ css                      # Hojas de estilo modulares
     ┃ ┣ C&P.css                # Estilos globales y layout maestro
     ┃ ┣ inicio.css, tienda.css, inventario.css, etc.
     ┣ imagenes                 # Recursos graficos y multimedia
     ┣ js
     ┃ ┗ app.js                 # Logica interactiva del cliente y Fetch API
     ┣ inicio.php               # Landing page principal
     ┣ inventario.php           # Vista del garaje con filtrado
     ┣ Login.php / Registro.php # Controladores de sesion
     ┣ procesar_compra.php      # Endpoint asincrono para transacciones
     ┗ tienda.php               # Catalogo de objetos y carrito

---

## Requisitos y Despliegue Local

Para ejecutar la plataforma en tu entorno de desarrollo, sigue estos pasos:

1. **Requisitos:** Tener instalada la suite XAMPP (Apache + MariaDB) o similar.
2. **Clonar el repositorio:** Clona esta carpeta dentro de tu directorio `htdocs` (en XAMPP) o `www` (en WAMP).
3. **Base de Datos:** 
   * Abre `phpMyAdmin` (`http://localhost/phpmyadmin`).
   * Crea una base de datos llamada `rlo_db`.
   * Importa el archivo `.sql` de tu modelo de datos para generar las tablas.
4. **Configuracion:** Verifica que las credenciales en `/config/db.php` coincidan con tu servidor local.
5. **Ejecucion:** Abre tu navegador y accede a `http://localhost/TFC/inicio.php`.

---

## Hoja de Ruta (Futuras Mejoras)

- [ ] **Pasarelas de Pago:** Integración de APIs de cobro real (Stripe/PayPal) para dotar de funcionalidad financiera completa a la tienda.
- [ ] **Modulo de Comunidad:** Creación de un foro interactivo donde los usuarios puedan debatir y votar sobre futuras actualizaciones del juego.

---

## Autor

* **Diego González Nogueira** - 2º DAW