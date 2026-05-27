<?php
    session_start();
    require_once 'config/db.php'; 
    $creditos = 0;
    if (isset($_SESSION['usuario_id'])) {
        $stmt = $pdo->prepare("SELECT creditos FROM usuarios WHERE id = ?");
        $stmt->execute([$_SESSION['usuario_id']]);
        $user_data = $stmt->fetch(PDO::FETCH_ASSOC);
        $creditos = $user_data['creditos'] ?? 0;
    }

    $objetos_comprados = [];
    if (isset($_SESSION['usuario_id'])) {
        $stmt = $pdo->prepare("SELECT objeto_id FROM inventario WHERE usuario_id = ?");
        $stmt->execute([$_SESSION['usuario_id']]);
        $objetos_comprados = $stmt->fetchAll(PDO::FETCH_COLUMN);
    }
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
                        <a href="logout.php" style="color: inherit;" title="Cerrar Sesión"><i class="fa-solid fa-right-from-bracket"></i></a>
                    <?php else: ?>
                        <a href="Login.php" style="color: inherit;" title="Iniciar Sesión"><i class="fa-regular fa-user"></i></a>
                    <?php endif; ?>
                    
                    <i class="fa-regular fa-envelope"></i>
                    
                    <div id="icono-carrito-wrapper" style="position: relative; display: inline-block; cursor: pointer;">
                        <i class="fa-solid fa-shopping-cart"></i>
                        <span id="contador-carrito" class="badge-carrito">0</span>
                        
                        <div id="panel-carrito" class="panel-carrito">
                            <h3 style="cursor: default;">Tu Carrito</h3>
                            <div id="lista-carrito" style="cursor: default;">
                                <p style="text-align: center; color: #777;">El carrito está vacío</p>
                            </div>
                            <div class="total-carrito" style="cursor: default;">
                                <strong>Total: </strong> <span id="total-precio">0 cr</span>
                            </div>
                            <button id="btn-pagar" style="width: 100%; padding: 10px; background-color: #2ed573; color: black; font-weight: bold; border: 2px solid black; border-radius: 5px; cursor: pointer; margin-top: 10px;">Finalizar Compra</button>
                        </div>
                    </div>
                </div>
                <?php if (isset($_SESSION['usuario_id'])): ?>
                    <div class="display-creditos">
                        <i class="fa-solid fa-coins"></i> <?php echo number_format($creditos); ?> cr
                    </div>
                <?php endif; ?>
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
                        <?php if (in_array(1, $objetos_comprados)): ?>
                            <button class="btn-comprar" disabled style="background-color: #555; cursor: not-allowed;">En posesión</button>
                        <?php else: ?>
                            <button class="btn-comprar" data-id="1" data-precio="800">Comprar</button>
                        <?php endif; ?>
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
                            <?php if (in_array(2, $objetos_comprados)): ?>
                                <button class="btn-mini" disabled style="background-color: #555; color: white; cursor: not-allowed; width: auto; padding: 0 10px; font-size: 0.9rem; border-radius: 5px;">En posesión</button>
                            <?php else: ?>
                                <button class="btn-mini" data-id="2" data-precio="200"><i class="fa-solid fa-cart-plus"></i></button>
                            <?php endif; ?>
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
                            <?php if (in_array(3, $objetos_comprados)): ?>
                                <button class="btn-mini" disabled style="background-color: #555; color: white; cursor: not-allowed; width: auto; padding: 0 10px; font-size: 0.9rem; border-radius: 5px;">En posesión</button>
                            <?php else: ?>
                                <button class="btn-mini" data-id="3" data-precio="500"><i class="fa-solid fa-cart-plus"></i></button>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>

                <div class="card-diaria">
                    <div class="img-diaria">
                        <img src="imagenes/animusgp-Purple.png" alt="Animus">
                    </div>
                    <div class="info-diaria">
                        <h4>Animusgp (Morado)</h4>
                        <span class="tipo">Coche</span>
                        <div class="precio-btn">
                            <span class="precio">700 cr</span>
                            <?php if (in_array(4, $objetos_comprados)): ?>
                                <button class="btn-mini" disabled style="background-color: #555; color: white; cursor: not-allowed; width: auto; padding: 0 10px; font-size: 0.9rem; border-radius: 5px;">En posesión</button>
                            <?php else: ?>
                                <button class="btn-mini" data-id="4" data-precio="700"><i class="fa-solid fa-cart-plus"></i></button>
                            <?php endif; ?>
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
                            <?php if (in_array(5, $objetos_comprados)): ?>
                                <button class="btn-mini" disabled style="background-color: #555; color: white; cursor: not-allowed; width: auto; padding: 0 10px; font-size: 0.9rem; border-radius: 5px;">En posesión</button>
                            <?php else: ?>
                                <button class="btn-mini" data-id="5" data-precio="900"><i class="fa-solid fa-cart-plus"></i></button>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>

                <div class="card-diaria">
                    <div class="img-diaria">
                        <img src="imagenes/SombreroMariachi.png" alt="Sombrero">
                    </div>
                    <div class="info-diaria">
                        <h4>Sombrero Mariachi</h4>
                        <span class="tipo">Adorno</span>
                        <div class="precio-btn">
                            <span class="precio">50 cr</span>
                            <?php if (in_array(6, $objetos_comprados)): ?>
                                <button class="btn-mini" disabled style="background-color: #555; color: white; cursor: not-allowed; width: auto; padding: 0 10px; font-size: 0.9rem; border-radius: 5px;">En posesión</button>
                            <?php else: ?>
                                <button class="btn-mini" data-id="6" data-precio="50"><i class="fa-solid fa-cart-plus"></i></button>
                            <?php endif; ?>
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
                            <?php if (in_array(7, $objetos_comprados)): ?>
                                <button class="btn-mini" disabled style="background-color: #555; color: white; cursor: not-allowed; width: auto; padding: 0 10px; font-size: 0.9rem; border-radius: 5px;">En posesión</button>
                            <?php else: ?>
                                <button class="btn-mini" data-id="7" data-precio="1200"><i class="fa-solid fa-cart-plus"></i></button>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <div id="modal-mensaje" class="modal-login" style="display: none;">
        <div class="modal-login-contenido" style="text-align: center; display: flex; flex-direction: column; align-items: center; gap: 10px;">
            <span class="cerrar-modal-mensaje" style="align-self: flex-end; cursor: pointer; font-size: 1.5rem;">&times;</span>
            <i id="icono-mensaje" class="fa-solid fa-circle-check" style="font-size: 3rem;"></i>
            <h3 id="titulo-mensaje" style="margin: 0;">Título</h3>
            <p id="texto-mensaje" style="margin-bottom: 15px;">Texto del mensaje</p>
            <button id="btn-cerrar-mensaje" style="padding: 10px 20px; border: none; border-radius: 5px; cursor: pointer; font-weight: bold; width: 100%;">Aceptar</button>
        </div>
    </div>

    <div id="modal-login" class="modal-login" style="display: none;">
        <div class="modal-login-contenido">
            <span class="cerrar-modal">&times;</span>
            <i class="fa-solid fa-circle-exclamation"></i>
            <h3>¡Atención!</h3>
            <p>Debes iniciar sesión o registrarte para finalizar tu compra.</p>
            <a href="Login.php" class="btn-ir-login">Iniciar Sesión</a>
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
    const usuarioLogueado = <?php echo isset($_SESSION['usuario_id']) ? 'true' : 'false'; ?>;
</script>
<script src="js/app.js"></script>