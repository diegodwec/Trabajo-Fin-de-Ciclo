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
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Noticias</title>
    <script src="https://kit.fontawesome.com/69898e44be.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/noticias.css">
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
            <a href="tienda.php"><span>Tienda</span></a>
            <a href="noticias.php" class="activo"><span>Noticias</span></a>
            <?php if (isset($_SESSION['usuario_id'])): ?>
                <a href="logout.php"><span>Cerrar Sesión</span></a>
            <?php else: ?>
                <a href="Login.php"><span>Cuenta</span></a>
            <?php endif; ?>
        </nav>
    </header>





    <main class="contenedor-noticias">
        
        <h1 class="titulo-seccion">Últimas Novedades</h1>

        <div class="noticia-destacada">
            <div class="imagen-noticia">
                <img src="imagenes/rlcs-2026-schedule.avif" alt="RLCS 2026">
            </div>
            <div class="contenido-noticia">
                <span class="etiqueta">Esports</span>
                <h2>Nuevo circuito competitivo: RLCS 2026 SCHEDULE</h2>
                <p>
                    La temporada de 2026 introduce una estructura renovada. Conoce todos los detalles sobre el Split 1 y el Split 2, y cómo clasificar para el Campeonato Mundial.
                    <span class="texto-extra" style="display: none;"> Además, el *prize pool* de este año rompe todos los récords anteriores, ofreciendo nuevas dinámicas de formato suizo en las clasificatorias regionales.</span>
                </p>
                <button class="leer-mas">Leer más</button>
            </div>
        </div>

        <div class="grid-secundarias">
            
            <div class="tarjeta-noticia">
                <div class="imagen">
                    <img src="imagenes/Rocket-League-x-Sonic-the-Hedgehog.jpg" alt="Sonic x Rocket League">
                </div>
                <div class="info">
                    <span class="etiqueta nuevo">Nuevo</span>
                    <h3>Rocket League x Sonic</h3>
                    <p>
                        ¡El erizo azul llega al campo! Descubre los nuevos cosméticos y el evento de tiempo limitado.
                        <span class="texto-extra" style="display: none;"> Consigue las ruedas de los anillos dorados y la calcomanía animada completando los desafíos semanales antes del 15 de junio.</span>
                    </p>
                    <a href="#">Leer artículo <i class="fa-solid fa-arrow-right"></i></a>
                </div>
            </div>  

            <div class="tarjeta-noticia coche">
                <div class="imagen">
                    <img src="imagenes/fennec.png" alt="Nuevo Coche">
                </div>
                <div class="info">
                    <span class="etiqueta tienda">Tienda</span>
                    <h3>Llega el nuevo Fennec Dorado</h3>
                    <p>
                        Disponible por tiempo limitado en la tienda de objetos. No te pierdas esta edición exclusiva.
                        <span class="texto-extra" style="display: none;"> El lote incluye también las ruedas y el acelerador 'Dorados', y estará disponible en rotación hasta el próximo martes a las 20:00 CET. ¡Hazte con él antes de que desaparezca del catálogo!</span>
                    </p>
                    <a href="#">Leer artículo <i class="fa-solid fa-arrow-right"></i></a>
                </div>
            </div>

            <div class="tarjeta-noticia">
                <div class="imagen">
                    <img src="imagenes/notas-parche.jpg" alt="Notas del Parche">
                </div>
                <div class="info">
                    <span class="etiqueta actualizacion">Update</span>
                    <h3>Notas del Parche v2.34</h3>
                    <p>
                        Ajustes en la hitbox del Octane y mejoras en la estabilidad de los servidores.
                        <span class="texto-extra" style="display: none;"> Además de la corrección visual en la pintura de varios chasis clásicos, se han implementado mejoras en el matchmaking de la lista de reproducción competitiva para reducir los tiempos de espera en los rangos más altos (Grand Champion y SSL).</span>
                    </p>
                    <a href="#">Leer artículo <i class="fa-solid fa-arrow-right"></i></a>
                </div>
            </div>
            <div class="grid-secundarias fila-extra" style="display: none; margin-top: 2rem;">
    
            <div class="tarjeta-noticia">
                <div class="imagen">
                    <img src="imagenes/torrock.jpg" alt="Torneo">
                </div>
                <div class="info">
                    <span class="etiqueta esports">Comunidad</span>
                    <h3>Torneo de la Comunidad RLO</h3>
                    <p>
                        ¡Inscríbete en nuestro primer torneo 3v3!
                        <span class="texto-extra" style="display: none;"> Habrá premios en créditos para los ganadores. Cierre de inscripciones este viernes.</span>
                    </p>
                    <a href="#">Leer artículo <i class="fa-solid fa-arrow-right"></i></a>
                </div>
            </div>

            <div class="tarjeta-noticia">
                <div class="imagen">
                    <img src="imagenes/recomro.jpg" alt="Recompensas">
                </div>
                <div class="info">
                    <span class="etiqueta update">Recompensas</span>
                    <h3>Recompensas de final de temporada</h3>
                    <p>
                        Anunciadas las ruedas exclusivas por rango.
                        <span class="texto-extra" style="display: none;"> Recuerda que necesitas las 10 victorias requeridas para desbloquear la recompensa de tu mayor rango alcanzado.</span>
                    </p>
                    <a href="#">Leer artículo <i class="fa-solid fa-arrow-right"></i></a>
                </div>
            </div>

            <div class="tarjeta-noticia">
                <div class="imagen">
                    <img src="imagenes/himnosrocket.webp" alt="Música">
                </div>
                <div class="info">
                    <span class="etiqueta nuevo">Música</span>
                    <h3>Nuevos himnos de jugador</h3>
                    <p>
                        La banda sonora se actualiza con nuevos temas.
                        <span class="texto-extra" style="display: none;">Entra a la tienda para escuchar los nuevos himnos electrónicos disponibles en el pack MonsterCat Vol. 7.</span>
                    </p>
                    <a href="#">Leer artículo <i class="fa-solid fa-arrow-right"></i></a>
                </div>
            </div>
        </div> </div> <div class="contenedor-botones-noticias">
            <button id="btn-cargar-mas" class="btn-noticias">Mostrar más noticias</button>
            <button id="btn-mostrar-menos" class="btn-noticias" style="display: none;">Mostrar menos noticias</button>
        </div>
    </main>

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