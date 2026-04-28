<?php
    session_start();
    require 'config/db.php';

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $nombre = trim($_POST['Nombre']);
        $apellidos = trim($_POST['Apellidos']);
        $pais = $_POST['pais']; 
        $email = trim($_POST['Email']);
        $password = $_POST['Contraseña'];

        $passwordHash = password_hash($password, PASSWORD_DEFAULT);

        $sql = "INSERT INTO usuarios (nombre, apellidos, pais, email, password) VALUES (?, ?, ?, ?, ?)";
        $stmt = $pdo->prepare($sql);

        try {
            $stmt->execute([$nombre, $apellidos, $pais, $email, $passwordHash]);
            $mensaje = "¡Usuario registrado con éxito!";
        } catch (PDOException $e) {
            $mensaje = "Error al registrar: " . $e->getMessage();
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <script src="https://kit.fontawesome.com/69898e44be.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/Login.css">
    <link rel="stylesheet" href="css/C&P.css">
</head>
<body>
    <header class="header">
        <div class="logo">
            <a href="inicio.html" class="logo_link">
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
            <a href="inicio.html"><span>Inicio</span></a>
            <a href="inventario.html"><span>Inventario</span></a>
            <a href="tienda.html"><span>Tienda</span></a>
            <a href="noticias.html"><span>Noticias</span></a>
            <a href="Login.php" class="activo"><span>Cuenta</span></a>
        </nav>
    </header>

    <div class="guardar_datos">
        <form>
            <div class="contenido-form">
                <div class="columna-inputs">
                    <label>Nombre: </label>
                    <input type="text" name="Nombre" placeholder="Nombre">
                    <label>Apellidos: </label>
                    <input type="text" name="Apellidos" placeholder="Apellidos">
                    
                    <label>País: </label>
                    <select>
                        <option value="España">España</option>
                        <option value="Argentina">Argentina</option>
                        <option value="México">México</option>
                        <option value="Chile">Chile</option>
                    </select>

                    <label>Email: </label>
                    <input type="text" name="Email" placeholder="Email">
                    <label>Contraseña: </label>
                    <input type="text" name="Contraseña" placeholder="Contraseña">
                </div>

                <div class="columna-foto">
                    <p class="titulo-foto">Foto de perfil</p>
                    <input type="file" id="foto" class="input-oculto">
                    <label for="foto" class="btn-foto">
                        <i class="fa-regular fa-user"></i>
                    </label>
                </div>
            </div>
            <button type="submit" class="btn-enviar">Enviar</button>
        </form> 
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