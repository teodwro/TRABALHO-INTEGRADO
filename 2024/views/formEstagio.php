<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de Estágio - Adicionar Estágio</title>
</head>
<body>
    <header>
        <?php include("includes/menu.php"); ?>
    </header>

    <main>
        <h1 id="titulo-principal">Gerenciar Estágio</h1>
        <a href="estagios.php" aria-label="Voltar para a lista de estágios">Voltar</a>
        <form action="salvarEstagio.php" method="POST" aria-labelledby="form-titulo">
            <input type="hidden" name="id" value="<?php echo $estagio->getIdEstagio(); ?>">
            <label for="nome-cidade">Nome da Cidade:</label>
            <input type="text" id="nome-cidade" name="nome" value="<?php echo $cidade->getNome(); ?>" placeholder="Digite o nome da cidade" required>
            <small id="nome-ajuda">Insira o nome completo da cidade.</small>
            <button type="submit" aria-label="Salvar cidade">Salvar</button>
        </form>
    </main>
</body>
</html>
