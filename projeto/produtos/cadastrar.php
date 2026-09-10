<?php require_once '../admin/auth_check.php'; ?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Cadastrar Produto</title>
</head>
<body>
    <h2>Cadastrar Produto</h2>
    <form action="salvar.php" method="POST">
        <label>Nome:</label><br>
        <input type="text" name="nome" required><br><br>

        <label>Descrição:</label><br>
        <textarea name="descricao"></textarea><br><br>

        <label>Preço:</label><br>
        <input type="number" step="0.01" name="preco" required><br><br>

        <label>Quantidade:</label><br>
        <input type="number" name="quantidade" required><br><br>

        <button type="submit">Salvar Produto</button>
    </form>
    <p><a href="listar.php">Voltar</a></p>
</body>
</html>