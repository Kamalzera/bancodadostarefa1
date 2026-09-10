<?php
require_once '../admin/auth_check.php';
require_once '../config/conexao.php';

$id = $_GET['id'] ?? null;
if (!$id) { header('Location: listar.php'); exit; }

$stmt = $pdo->prepare("SELECT * FROM produtos WHERE id = :id");
$stmt->execute([':id' => $id]);
$produto = $stmt->fetch();

if (!$produto) { header('Location: listar.php'); exit; }
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Editar Produto</title>
</head>
<body>
    <h2>Editar Produto #<?= $produto['id']; ?></h2>
    <form action="salvar.php" method="POST">
        <input type="hidden" name="id" value="<?= $produto['id']; ?>">

        <label>Nome:</label><br>
        <input type="text" name="nome" value="<?= htmlspecialchars($produto['nome']); ?>" required><br><br>

        <label>Descrição:</label><br>
        <textarea name="descricao"><?= htmlspecialchars($produto['descricao']); ?></textarea><br><br>

        <label>Preço:</label><br>
        <input type="number" step="0.01" name="preco" value="<?= $produto['preco']; ?>" required><br><br>

        <label>Quantidade:</label><br>
        <input type="number" name="quantidade" value="<?= $produto['quantidade']; ?>" required><br><br>

        <button type="submit">Atualizar Produto</button>
    </form>
    <p><a href="listar.php">Voltar</a></p>
</body>
</html>