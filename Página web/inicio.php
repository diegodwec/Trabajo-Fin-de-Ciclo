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
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio</title>
        <script src="https://kit.fontawesome.com/69898e44be.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/inicio.css">
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
            <a href="inicio.php" class="activo"><span>Inicio</span></a>
            <a href="inventario.php"><span>Inventario</span></a>
            <a href="tienda.php"><span>Tienda</span></a>
            <a href="noticias.php"><span>Noticias</span></a>
            <?php if (isset($_SESSION['usuario_id'])): ?>
                <a href="logout.php"><span>Cerrar Sesión</span></a>
            <?php else: ?>
                <a href="Login.php"><span>Cuenta</span></a>
            <?php endif; ?>
        </nav>
    </header>





<div class="contenedor">
        
        <div class="cuadrado1">
            <div class="slider-contenedor" id="slider">
                <div class="slide" style="background-image: url('imagenes/rocketLeague.webp');"></div>
                
                <div class="slide" style="background-image: url('imagenes/portada2.jpg');"></div>
                
                <div class="slide" style="background-image: url('imagenes/portada3.webp');"></div>
                
                <div class="slide" style="background-image: url('imagenes/rocketLeague.webp');"></div>
            </div>
            <div class="cajaTexto">
                <h1>ROCKET LEAGUE</h1>
                <p>La combinación definitiva de fútbol arcade y caos vehicular.</p>
                <a href="tienda.php" class="btnTienda">Ver Tienda <i class="fa-solid fa-arrow-right"></i></a>
            </div>
        </div>

        <div class="sobre-nosotros">
            <div class="caja-info">
                <h2><i class="fa-solid fa-rocket"></i> Sobre Nosotros</h2>
                <p>
                    Rocket League combina la emoción del fútbol con la velocidad de los autos propulsados por cohetes.
                    Es un juego donde la habilidad, la estrategia y la coordinación se unen para crear momentos espectaculares.
                    <br><br>
                    <strong>RLO</strong> busca reflejar esa energía. Esta página combina funciones de tienda, blog y portal informativo dedicado al universo de Rocket League. 
                    Nuestro objetivo es aprender y mostrar cómo se puede construir una web moderna y atractiva.
                </p>
            </div>
            <div class="imagen-info">
                <img src="imagenes/EstadioDHF.jpg" alt="Estadio Rocket League"> 
            </div>
        </div>

        <div class="accesos-rapidos">
            <a href="inventario.php" class="tarjeta">
                <i class="fa-solid fa-warehouse"></i>
                <h3>Inventario</h3>
                <p>Gestiona tus objetos</p>
            </a>
            <a href="noticias.php" class="tarjeta">
                <i class="fa-regular fa-newspaper"></i>
                <h3>Noticias</h3>
                <p>Últimas novedades</p>
            </a>
            <a href="Login.php" class="tarjeta">
                <i class="fa-solid fa-shop"></i>
                <h3>Cuenta</h3>
                <p>Desea registrarse</p>
            </a>
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