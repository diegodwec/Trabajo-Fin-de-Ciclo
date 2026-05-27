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
    <title>Inventario</title>
    <script src="https://kit.fontawesome.com/69898e44be.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/inventario.css">
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
            <a href="inventario.php" class="activo"><span>Inventario</span></a>
            <a href="tienda.php"><span>Tienda</span></a>
            <a href="noticias.php"><span>Noticias</span></a>
            <?php if (isset($_SESSION['usuario_id'])): ?>
                <a href="logout.php"><span>Cerrar Sesión</span></a>
            <?php else: ?>
                <a href="Login.php"><span>Cuenta</span></a>
            <?php endif; ?>
        </nav>
    </header>



    <div class="contenedor-principal">
        
        <div class="filtros">
            <label class="btn-desplegable">
                <input type="checkbox" id="trigger-filtros"> 
                <span><i class="fa-solid fa-filter"></i> Mostrar Filtros <i class="fa-solid fa-chevron-down flecha"></i></span>
            </label>

            <div class="contenido-filtros">
                
                <div class="titulo-filtro escritorio-solo">
                    <h3><i class="fa-solid fa-filter"></i> Filtrar por</h3>
                </div>

                <div class="grupo-filtro">
                    <h4>Categoría</h4>
                    <label><input type="checkbox"> Coches</label>
                    <label><input type="checkbox"> Calcomanías</label>
                    <label><input type="checkbox"> Ruedas</label>
                    <label><input type="checkbox"> Turbos</label>
                    <label><input type="checkbox"> Explosiones</label>
                </div>

                <div class="grupo-filtro">
                    <h4>Rareza</h4>
                    <label><input type="checkbox"> Común</label>
                    <label><input type="checkbox"> Importado</label>
                    <label><input type="checkbox"> Exótico</label>
                    <label><input type="checkbox"> Mercado Negro</label>
                </div>

                <button class="btn-aplicar">Aplicar Filtros</button>
            </div>
        </div>

        <div class="inventario">
            <div class="galeria">
                <h2>Mis Objetos</h2>
                <div class="ordenar">
                    <label>Ordenar por: </label>
                    <select>
                        <option>Más recientes</option>
                        <option>Rareza</option>
                        <option>Alfabético</option>
                    </select>
                </div>
            </div>

            <div class="items-flex">
                <?php
                if (isset($_SESSION['usuario_id'])) {
                    
                    $sql = "SELECT o.nombre, o.precio, o.imagen, o.rareza, c.nombre AS categoria 
                            FROM objetos o 
                            JOIN inventario i ON o.id = i.objeto_id 
                            JOIN categorias c ON o.id_categoria = c.id
                            WHERE i.usuario_id = ?";
                            
                    $stmt = $pdo->prepare($sql);
                    $stmt->execute([$_SESSION['usuario_id']]);
                    $mis_objetos = $stmt->fetchAll(PDO::FETCH_ASSOC);

                    if (count($mis_objetos) > 0) {
                        foreach ($mis_objetos as $item) {
                            $clase_css = strtolower($item['rareza']); 
                            $clase_css = str_replace(' ', '-', $clase_css);
                            $clase_css = str_replace(['á', 'é', 'í', 'ó', 'ú'], ['a', 'e', 'i', 'o', 'u'], $clase_css); 

                            echo '
                            <div class="item-card '.$clase_css.'" 
                                data-categoria="'.strtolower($item['categoria']).'" 
                                data-rareza="'.strtolower($item['rareza']).'" 
                                data-nombre="'.$item['nombre'].'">
                                <div class="imagen-item">
                                    <img src="'.$item['imagen'].'" alt="'.$item['nombre'].'">
                                </div>
                                <div class="info-item">
                                    <h3>'.$item['nombre'].'</h3>
                                    <p class="tipo">'.ucfirst($item['categoria']).'</p>
                                    <span class="rareza">'.ucfirst($item['rareza']).'</span>
                                </div>
                            </div>';
                        }
                    } else {
                        echo '<div style="width: 100%; text-align: center; padding: 40px; color: #555;">
                            <i class="fa-solid fa-box-open" style="font-size: 3rem; margin-bottom: 15px; color: #aaa;"></i>
                            <h3>Tu inventario está vacío</h3>
                            <p>¡Pásate por la tienda para conseguir tus primeros objetos!</p>
                        </div>';
                    }

                } else {
                    echo '
                    <div style="width: 100%; display: flex; flex-direction: column; align-items: center; justify-content: center; min-height: 480px; background-color: rgba(255, 255, 255, 0.5); border: 2px dashed #b8860b; border-radius: 10px; margin-top: 10px;">
                        <i class="fa-solid fa-lock" style="font-size: 4rem; color: #b8860b; margin-bottom: 15px;"></i>
                        <h2 style="color: #333; margin-bottom: 10px;">Inventario Bloqueado</h2>
                        <p style="color: #666; font-size: 1.1rem; margin-bottom: 25px;">Debes iniciar sesión para ver los objetos que posees.</p>
                        <a href="Login.php" style="padding: 10px 25px; background-color: #1e3c72; color: white; text-decoration: none; border-radius: 5px; font-weight: bold; font-size: 1rem; transition: background 0.3s;">Iniciar Sesión</a>
                    </div>';
                }
                ?>
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