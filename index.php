<?php
require_once 'auth_check.php';
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Painel Administrativo</title>
</head>
<body>
    <h1>Bem-vindo, <?= htmlspecialchars($_SESSION['usuario_nome']); ?>!</h1>
    
    <nav>
        <ul>
            <li><a href="../produtos/listar.php">Gerenciar Produtos</a></li>
            <li><a href="../login/logout.php">Sair</a></li>
        </ul>
    </nav>
</body>
</html>