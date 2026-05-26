<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tienda</title>
    <script src="https://kit.fontawesome.com/69898e44be.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/tienda.css">
    <link rel="stylesheet" href="css/C&P.css">
</head>
<body>
    <header class="header">
        <div class="logo">
            <a href="inicio.php" class="logo_link">
                <img src="imagenes/Logo.png" alt="Logo" width="200px" height="200px">
                <h1 class="titulo_logo">RLO</h1>
            </a>
            <div class="carrito">
                <div class="iconos">
                    <?php if (isset($_SESSION['usuario_id'])): ?>
                        <a href="logout.php" style="color: inherit;"><i class="fa-solid fa-right-from-bracket"></i></a>
                    <?php else: ?>
                        <a href="Login.php" style="color: inherit;"><i class="fa-regular fa-user"></i></a>
                    <?php endif; ?>
                    
                    <i class="fa-regular fa-envelope"></i>
                </div>
                <input type="text" name="buscar" placeholder="buscar" class="buscar">
            </div>
        </div>

        <nav class="menu">
            <a href="inicio.php"><span>Inicio</span></a>
            <a href="inventario.php"><span>Inventario</span></a>
            <a href="tienda.php" class="activo"><span>Tienda</span></a>
            <a href="noticias.php"><span>Noticias</span></a>
            <?php if (isset($_SESSION['usuario_id'])): ?>
                <a href="logout.php"><span>Cerrar Sesión</span></a>
            <?php else: ?>
                <a href="Login.php"><span>Cuenta</span></a>
            <?php endif; ?>
        </nav>
    </header>




    <div class="contenedor-tienda">
        <div class="seccion-destacados">
            <h2 class="titulo-seccion"><i class="fa-solid fa-star"></i> OBJETOS DESTACADOS</h2>
            <div class="card-destacada">
                <div class="imagen-destacada">
                    <img src="imagenes/octanezsr.png" alt="Octane ZSR">
                </div>
                <div class="info-destacada">
                    <span class="etiqueta-tiempo"><i class="fa-regular fa-clock"></i> 48h restantes</span>
                    <h3 class="nombre-item">OCTANE ZSR</h3>
                    <p class="descripcion">El clásico renovado. Hitbox Octane con un diseño más agresivo y detallado.</p>
                    <div class="precio-compra">
                        <span class="precio">800 cr</span>
                        <button class="btn-comprar">Comprar</button>
                    </div>
                </div>
            </div>
        </div>

        <div class="seccion-diarios">
            <h2 class="titulo-seccion"><i class="fa-solid fa-calendar-day"></i> OBJETOS DIARIOS</h2>
            <div class="grid-diarios">
                <div class="card-diaria">
                    <div class="img-diaria">
                        <img src="imagenes/RuedasCristiano.png" alt="Cristiano">
                    </div>
                    <div class="info-diaria">
                        <h4>Cristiano</h4>
                        <span class="tipo">Ruedas</span>
                        <div class="precio-btn">
                            <span class="precio">200 cr</span>
                            <button class="btn-mini"><i class="fa-solid fa-cart-plus"></i></button>
                        </div>
                    </div>
                </div>

                <div class="card-diaria">
                    <div class="img-diaria">
                        <img src="imagenes/ExplosionNuclear.png" alt="Nuclear">
                    </div>
                    <div class="info-diaria">
                        <h4>Explosión Nuclear</h4>
                        <span class="tipo">Explosión de Gol</span>
                        <div class="precio-btn">
                            <span class="precio">500 cr</span>
                            <button class="btn-mini"><i class="fa-solid fa-cart-plus"></i></button>
                        </div>
                    </div>
                </div>

                <div class="card-diaria">
                    <div class="img-diaria">
                        <img src="imagenes/animusgp-Purple.png" alt="Fennec Carmesí">
                    </div>
                    <div class="info-diaria">
                        <h4>Animusgp (Morado)</h4>
                        <span class="tipo">Coche</span>
                        <div class="precio-btn">
                            <span class="precio">700 cr</span>
                            <button class="btn-mini"><i class="fa-solid fa-cart-plus"></i></button>
                        </div>
                    </div>
                </div>

                <div class="card-diaria">
                    <div class="img-diaria">
                        <img src="imagenes/20XX_decal_icon.webp" alt="20XX">
                    </div>
                    <div class="info-diaria">
                        <h4>20XX</h4>
                        <span class="tipo">Calcomanía</span>
                        <div class="precio-btn">
                            <span class="precio">900 cr</span>
                            <button class="btn-mini"><i class="fa-solid fa-cart-plus"></i></button>
                        </div>
                    </div>
                </div>

                <div class="card-diaria">
                    <div class="img-diaria">
                        <img src="imagenes/SombreroMariachi.png" alt="Mago">
                    </div>
                    <div class="info-diaria">
                        <h4>Sombrero Maraichi</h4>
                        <span class="tipo">Adorno</span>
                        <div class="precio-btn">
                            <span class="precio">50 cr</span>
                            <button class="btn-mini"><i class="fa-solid fa-cart-plus"></i></button>
                        </div>
                    </div>
                </div>

                <div class="card-diaria">
                    <div class="img-diaria">
                        <img src="imagenes/TurboEstandar.png" alt="Standard">
                    </div>
                    <div class="info-diaria">
                        <h4>Standard (Negro)</h4>
                        <span class="tipo">Turbo</span>
                        <div class="precio-btn">
                            <span class="precio">1200 cr</span>
                            <button class="btn-mini"><i class="fa-solid fa-cart-plus"></i></button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>




    <footer class="footer">
        <div class="seccion social">
            <a href="#"><i class="fab fa-facebook-f"></i></a>
            <a href="#"><i class="fab fa-instagram"></i></a>
            <a href="#"><i class="fab fa-youtube"></i></a>
        </div>
        <div class="seccion contacto">
            <p class="phone">+34 612 458 734</p>
            <p class="email">rlosupport@gmail.com</p>
        </div>
        <div class="chat-grupal">
            <a href="#"><i class="fas fa-users"></i></a>
            <a href="#"><span>Chat grupal</span></a>
        </div>
        <div class="stats">
            <p class="titulo">Stats</p>
            <a href="#"><p>1v1 skill</p></a>
            <a href="#"><p>2v2 skill</p></a>
            <a href="#"><p>3v3 skill</p></a>
        </div>
    </footer>
</body>
</html>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        
        // --- 1. PROTECCIÓN DE SESIÓN (Lee de PHP) ---
        const usuarioLogueado = <?php echo isset($_SESSION['usuario_id']) ? 'true' : 'false'; ?>;

        // Si no está logueado, protegemos los botones
        function verificarAcceso() {
            if (!usuarioLogueado) {
                alert("Debes iniciar sesión para usar el carrito.");
                window.location.href = 'Login.php';
                return false;
            }
            return true;
        }

        // --- 2. LÓGICA DEL CARRITO ---
        const carrito = [];
        const btnCarritoWrapper = document.getElementById('icono-carrito-wrapper');
        const panelCarrito = document.getElementById('panel-carrito');
        const listaCarrito = document.getElementById('lista-carrito');
        const contadorCarrito = document.getElementById('contador-carrito');
        const totalPrecio = document.getElementById('total-precio');

        // Evento abrir carrito
        btnCarritoWrapper.addEventListener('click', (event) => {
            event.stopPropagation();
            if (!verificarAcceso()) return; // Protegemos la apertura

            panelCarrito.style.display = (panelCarrito.style.display === 'flex') ? 'none' : 'flex';
        });

        panelCarrito.addEventListener('click', (event) => {
            event.stopPropagation();
        });

        document.addEventListener('click', () => {
            panelCarrito.style.display = 'none';
        });

        const botonesCompra = document.querySelectorAll('.btn-comprar, .btn-mini');

        botonesCompra.forEach(boton => {
            boton.addEventListener('click', function(e) {
                const card = this.closest('.card-destacada, .card-diaria');
                
                let nombre, precioStr, imgSrc;

                if (card.classList.contains('card-destacada')) {
                    nombre = card.querySelector('.nombre-item').textContent;
                    precioStr = card.querySelector('.precio').textContent;
                    imgSrc = card.querySelector('.imagen-destacada img').src;
                } else {
                    nombre = card.querySelector('h4').textContent;
                    precioStr = card.querySelector('.precio').textContent;
                    imgSrc = card.querySelector('.img-diaria img').src;
                }

                const precio = parseInt(precioStr.replace(/\D/g, ''));

                const item = { 
                    id: Date.now(),
                    nombre: nombre, 
                    precio: precio, 
                    imgSrc: imgSrc 
                };

                carrito.push(item);
                actualizarCarrito();
                
                panelCarrito.style.display = 'flex';
            });
        });

        function actualizarCarrito() {
            listaCarrito.innerHTML = '';
            let total = 0;

            if (carrito.length === 0) {
                listaCarrito.innerHTML = '<p style="text-align: center; color: #777;">El carrito está vacío</p>';
            } else {
                carrito.forEach((item, index) => {
                    total += item.precio;
                    
                    const div = document.createElement('div');
                    div.classList.add('item-en-carrito');
                    div.innerHTML = `
                        <img src="${item.imgSrc}" alt="${item.nombre}">
                        <div class="item-en-carrito-info">
                            <p>${item.nombre}</p>
                            <span>${item.precio} cr</span>
                        </div>
                        <button class="btn-eliminar" data-index="${index}"><i class="fa-solid fa-trash"></i></button>
                    `;
                    listaCarrito.appendChild(div);
                });
            }

            contadorCarrito.textContent = carrito.length;
            totalPrecio.textContent = total + ' cr';

            const botonesEliminar = document.querySelectorAll('.btn-eliminar');
            botonesEliminar.forEach(boton => {
                boton.addEventListener('click', function(e) {
                    const index = this.getAttribute('data-index');
                    carrito.splice(index, 1);
                    actualizarCarrito();
                });
            });
        }
    });
</script>