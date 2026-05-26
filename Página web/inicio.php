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
                    <i class="fa-regular fa-user"></i>
                    <i class="fa-regular fa-envelope"></i>
                    <i class="fa-solid fa-shopping-cart"></i>
                </div>
                <input type="text"  name="buscar" placeholder="buscar" class="buscar">
            </div>
        </div>

        <nav class="menu">
            <a href="inicio.php" class="activo"><span>Inicio</span></a>
            <a href="inventario.php"><span>Inventario</span></a>
            <a href="tienda.php"><span>Tienda</span></a>
            <a href="noticias.php"><span>Noticias</span></a>
            <a href="Login.php"><span>Cuenta</span></a>
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
        const slider = document.getElementById('slider');
        let indiceActual = 0;
        
        const totalSlides = document.querySelectorAll('.slide').length; 

        if(slider && totalSlides > 0) {
            function rotarFondo() {
                indiceActual++;
                
                slider.style.transition = "transform 1s ease-in-out";
                
                let desplazamiento = -(indiceActual * 100);
                slider.style.transform = `translateX(${desplazamiento}%)`;

                if (indiceActual === totalSlides - 1) {
                    
                    setTimeout(function() {
                        slider.style.transition = "none";
                        
                        indiceActual = 0;
                        slider.style.transform = "translateX(0%)";
                    }, 1000); 
                }
            }

            setInterval(rotarFondo, 4000);
        }
    });
</script>