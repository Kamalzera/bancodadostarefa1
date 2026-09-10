<?php session_start(); ?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Login - Controle de Estoque</title>
</head>
<body>
    <h2>Acesso ao Sistema</h2>
    <?php if (isset($_GET['erro'])): ?>
        <p style="color:red;">E-mail ou senha inválidos.</p>
    <?php endif; ?>
    <?php if (isset($_GET['sucesso'])): ?>
        <p style="color:green;">Cadastro realizado! Faça seu login.</p>
    <?php endif; ?>

    <form action="autenticar.php" method="POST">
        <label>E-mail:</label><br>
        <input type="email" name="email" required><br><br>

        <label>Senha:</label><br>
        <input type="password" name="senha" required><br><br>

        <button type="submit">Entrar</button>
    </form>
    <p><a href="../usuarios/cadastro.php">Não tem conta? Cadastre-se</a></p>
</body>
</html>
