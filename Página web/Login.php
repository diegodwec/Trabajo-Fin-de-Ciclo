<?php
    session_start();
    require 'config/db.php';

    $mensaje = ""; 

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $email = trim($_POST['email']);
        $password = $_POST['password'];

        $sql = "SELECT * FROM usuarios WHERE email = ?";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$email]);
        $usuario = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($usuario && password_verify($password, $usuario['password'])) {
            $_SESSION['usuario_id'] = $usuario['id'];
            $_SESSION['usuario_nombre'] = $usuario['nombre'];
            
            header("Location: inicio.php");
            exit;
        } else {
            $mensaje = "Email o contraseña incorrectos.";
        }
    }
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar Sesión - RLO</title>
    <script src="https://kit.fontawesome.com/69898e44be.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/Login.css">
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
                <input type="text" name="buscar" placeholder="buscar" class="buscar">
            </div>
        </div>

        <nav class="menu">
            <a href="inicio.php"><span>Inicio</span></a>
            <a href="inventario.php"><span>Inventario</span></a>
            <a href="tienda.php"><span>Tienda</span></a>
            <a href="noticias.php"><span>Noticias</span></a>
            <a href="Login.php" class="activo"><span>Cuenta</span></a>
        </nav>
    </header>

    <div class="guardar_datos">
        <form method="POST" action="Login.php">
            
            <?php if ($mensaje != ""): ?>
                <p style="color: white; font-weight: bold; background: #e74c3c; padding: 10px; border-radius: 10px; width: 100%; text-align: center; margin-bottom: 20px;">
                    <?php echo $mensaje; ?>
                </p>
            <?php endif; ?>

            <div class="contenido-form" style="justify-content: center;">
                <div class="columna-inputs" style="width: 100%;">
                    <h2 style="text-align: center; margin-bottom: 20px;">Iniciar Sesión</h2>
                    
                    <label>Email: </label>
                    <input type="email" name="email" placeholder="Email" required>
                    
                    <label>Contraseña: </label>
                    <input type="password" name="password" placeholder="Contraseña" required>
                    
                    <p style="text-align: center; margin-top: 15px;">
                        ¿No tienes cuenta? <a href="registro.php" style="color: #000; font-weight: bold; text-decoration: underline;">Regístrate aquí</a>
                    </p>
                </div>
            </div>
            <button type="submit" class="btn-enviar">Entrar</button>
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