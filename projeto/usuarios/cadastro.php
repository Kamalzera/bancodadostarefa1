<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Cadastro de Usuário</title>
</head>
<body>
    <h2>Criar Conta</h2>
    <form action="salvar.php" method="POST">
        <label>Nome:</label><br>
        <input type="text" name="nome" required><br><br>

        <label>E-mail:</label><br>
        <input type="email" name="email" required><br><br>

        <label>Senha:</label><br>
        <input type="password" name="senha" required><br><br>

        <label>Confirmação da Senha:</label><br>
        <input type="password" name="senha_confirmacao" required><br><br>

        <button type="submit">Cadastrar</button>
    </form>
    <p><a href="../login/login.php">Já possui conta? Faça login</a></p>
</body>
</html>