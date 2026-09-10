<?php
require_once '../admin/auth_check.php';
require_once '../config/conexao.php';

$id = $_GET['id'] ?? null;

if ($id) {
    $stmt = $pdo->prepare("DELETE FROM produtos WHERE id = :id");
    $stmt->execute([':id' => $id]);
}

header('Location: listar.php');
exit;