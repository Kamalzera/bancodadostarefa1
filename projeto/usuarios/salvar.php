<?php
require_once '../config/conexao.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome  = trim($_POST['nome'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $senha = $_POST['senha'] ?? '';
    $senha_confirmacao = $_POST['senha_confirmacao'] ?? '';

    if (empty($nome) || empty($email) || empty($senha)) {
        die("Preencha todos os campos obrigatórios.");
    }

    if ($senha !== $senha_confirmacao) {
        die("As senhas não coincidem.");
    }

    // Verifica se o e-mail já foi cadastrado
    $stmt = $pdo->prepare("SELECT id FROM usuarios WHERE email = :email");
    $stmt->execute([':email' => $email]);
    
    if ($stmt->fetch()) {
        die("E-mail já cadastrado.");
    }

    // Criptografa a senha com hash seguro (Bcrypt)
    $senha_hash = password_hash($senha, PASSWORD_DEFAULT);

    $stmt = $pdo->prepare("INSERT INTO usuarios (nome, email, senha) VALUES (:nome, :email, :senha)");
    $stmt->execute([
        ':nome'  => $nome,
        ':email' => $email,
        ':senha' => $senha_hash
    ]);

    header('Location: ../login/login.php?sucesso=1');
    exit;
}