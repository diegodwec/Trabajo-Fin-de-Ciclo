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
                    <i class="fa-regular fa-user"></i>
                    <i class="fa-regular fa-envelope"></i>
                    <i class="fa-solid fa-shopping-cart"></i>
                </div>
                <input type="text"  name="buscar" placeholder="buscar" class="buscar">
            </div>
        </div>

        <nav class="menu">
            <a href="inicio.php"><span>Inicio</span></a>
            <a href="inventario.php"><span>Inventario</span></a>
            <a href="tienda.php"><span>Tienda</span></a>
            <a href="noticias.php" class="activo"><span>Noticias</span></a>
            <a href="Login.php"><span>Cuenta</span></a>
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
        
        const botonesTexto = document.querySelectorAll('.leer-mas, .info a');
        botonesTexto.forEach(boton => {
            boton.addEventListener('click', function(evento) {
                evento.preventDefault(); 
                const parrafo = this.previousElementSibling;
                const textoExtra = parrafo.querySelector('.texto-extra');

                if (textoExtra) {
                    if (textoExtra.style.display === "none") {
                        textoExtra.style.display = "inline";
                        if (this.classList.contains('leer-mas')) {
                            this.textContent = "Leer menos";
                        } else {
                            this.innerHTML = 'Leer menos <i class="fa-solid fa-arrow-up"></i>';
                        }
                    } else {
                        textoExtra.style.display = "none";
                        if (this.classList.contains('leer-mas')) {
                            this.textContent = "Leer más";
                        } else {
                            this.innerHTML = 'Leer artículo <i class="fa-solid fa-arrow-right"></i>';
                        }
                    }
                }
            });
        });

        const btnCargarMas = document.getElementById('btn-cargar-mas');
        const btnMostrarMenos = document.getElementById('btn-mostrar-menos');
        const filaExtra = document.querySelector('.fila-extra');

        if (btnCargarMas && btnMostrarMenos && filaExtra) {
            
            btnCargarMas.addEventListener('click', function() {
                filaExtra.style.display = "flex";
                btnMostrarMenos.style.display = "inline-block";
                this.style.display = "none";
            });

            btnMostrarMenos.addEventListener('click', function() {
                filaExtra.style.display = "none";
                this.style.display = "none";
                btnCargarMas.style.display = "inline-block";
                
                document.querySelector('.titulo-seccion').scrollIntoView({ behavior: 'smooth' });
            });
        }
    });
</script>