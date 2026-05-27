<?php
session_start();
require_once 'config/db.php';

header('Content-Type: application/json');

if (!isset($_SESSION['usuario_id'])) {
    echo json_encode(['status' => 'error', 'message' => 'Debes iniciar sesión.']);
    exit;
}

$data = json_decode(file_get_contents('php://input'), true);
$carrito = $data['carrito'];
$usuario_id = $_SESSION['usuario_id'];

if (empty($carrito)) {
    echo json_encode(['status' => 'error', 'message' => 'El carrito está vacío.']);
    exit;
}

$total_pagar = 0;
foreach ($carrito as $item) {
    $total_pagar += $item['precio'];
}

try {
    $pdo->beginTransaction();

    $stmt = $pdo->prepare("SELECT creditos FROM usuarios WHERE id = ? FOR UPDATE");
    $stmt->execute([$usuario_id]);
    $user = $stmt->fetch();

    if ($user['creditos'] < $total_pagar) {
        throw new Exception("No tienes suficientes créditos.");
    }

    $stmt = $pdo->prepare("UPDATE usuarios SET creditos = creditos - ? WHERE id = ?");
    $stmt->execute([$total_pagar, $usuario_id]);

    $stmt = $pdo->prepare("INSERT INTO inventario (usuario_id, objeto_id) VALUES (?, ?)");
    foreach ($carrito as $item) {
        $stmt->execute([$usuario_id, $item['id']]);
    }

    $pdo->commit();
    echo json_encode(['status' => 'success']);

} catch (Exception $e) {
    $pdo->rollBack();
    echo json_encode(['status' => 'error', 'message' => $e->getMessage()]);
}
?>