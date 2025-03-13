<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de Estágio - Adicionar Usuários</title>

    <?php include("includes/menu.php"); ?>

    <h1>Usuários</h1>
    <a href="usuarios.php" aria-label="Voltar para a lista de usuários">Voltar</a>

    <form action="salvarUsuario.php" method="POST" aria-labelledby="form-titulo">
        <input type="hidden" name="id" value="<?php echo $usuario->getId(); ?>">

        <label for="login">Login:</label>
        <input type="text" id="login" name="login" value="<?php echo $usuario->getLogin(); ?>" placeholder="Digite o login" required>

        <label for="senha">Senha:</label>
        <input type="password" id="senha" name="senha" placeholder="Digite a senha" <?php echo !empty($usuario->getId()) ? '' : 'required'; ?>>

        <?php if (!empty($usuario->getId())): ?>
            <small>Para deixar a senha atual, basta deixar o campo em branco!</small>
        <?php endif; ?>

        <label for="nivel">Nível de Acesso:</label>
        <select name="nivel" id="nivel" required>
            <option value="1" <?php echo ($usuario->getNivel() == 1) ? 'selected' : ''; ?>>
                Nível 1 (Para professores) (Apenas Visualização)
            </option>
            <option value="2" <?php echo ($usuario->getNivel() == 2) ? 'selected' : ''; ?>>
                Nível 2 (Alterar Dados)
            </option>
        </select>

        <button type="submit" aria-label="Salvar usuário">Salvar</button>
    </form>

</body>
</html>
