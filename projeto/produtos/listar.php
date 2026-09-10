<?php
require_once '../admin/auth_check.php';
require_once '../config/conexao.php';

$stmt = $pdo->query("SELECT * FROM produtos ORDER BY id DESC");
$produtos = $stmt->fetchAll();
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Lista de Produtos</title>
</head>
<body>
    <h2>Gerenciamento de Produtos</h2>
    <p><a href="cadastrar.php">+ Novo Produto</a> | <a href="../admin/index.php">Voltar ao Painel</a></p>

    <table border="1" cellpadding="8" cellspacing="0">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Descrição</th>
                <th>Preço</th>
                <th>Qtd</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            <?php if (empty($produtos)): ?>
                <tr>
                    <td colspan="6">Nenhum produto cadastrado.</td>
                </tr>
            <?php else: ?>
                <?php foreach ($produtos as $p): ?>
                    <tr>
                        <td><?= $p['id']; ?></td>
                        <td><?= htmlspecialchars($p['nome']); ?></td>
                        <td><?= htmlspecialchars($p['descricao']); ?></td>
                        <td>R$ <?= number_format($p['preco'], 2, ',', '.'); ?></td>
                        <td><?= $p['quantidade']; ?></td>
                        <td>
                            <a href="editar.php?id=<?= $p['id']; ?>">Editar</a> | 
                            <a href="excluir.php?id=<?= $p['id']; ?>" onclick="return confirm('Deseja realmente excluir este produto?');">Excluir</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php endif; ?>
        </tbody>
    </table>
</body>
</html>