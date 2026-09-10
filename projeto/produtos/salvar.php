<?php
require_once '../admin/auth_check.php';
require_once '../config/conexao.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id         = $_POST['id'] ?? null;
    $nome       = trim($_POST['nome'] ?? '');
    $descricao  = trim($_POST['descricao'] ?? '');
    $preco      = (float)($_POST['preco'] ?? 0);
    $quantidade = (int)($_POST['quantidade'] ?? 0);

    if (empty($nome) || $preco <= 0) {
        die("Dados inválidos.");
    }

    if ($id) {
        // Atualiza produto existente
        $stmt = $pdo->prepare("UPDATE produtos SET nome = :nome, descricao = :descricao, preco = :preco, quantidade = :quantidade WHERE id = :id");
        $stmt->execute([
            ':nome'       => $nome,
            ':descricao'  => $descricao,
            ':preco'      => $preco,
            ':quantidade' => $quantidade,
            ':id'         => $id
        ]);
    } else {
        // Insere novo produto
        $stmt = $pdo->prepare("INSERT INTO produtos (nome, descricao, preco, quantidade) VALUES (:nome, :descricao, :preco, :quantidade)");
        $stmt->execute([
            ':nome'       => $nome,
            ':descricao'  => $descricao,
            ':preco'      => $preco,
            ':quantidade' => $quantidade
        ]);
    }

    header('Location: listar.php');
    exit;
}