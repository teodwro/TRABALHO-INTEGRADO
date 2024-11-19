<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de Estágio</title>
</head>
<body>

    <?php include("includes/menu.php"); ?>

    <h1>Sistema de Estágio - Cidades</h1>
    <a href="cidades.php">Voltar</a>
    <form action="salvarCidade.php" method="POST">
        <input type="hidden" name="id" value="<?php echo $cidade->getId(); ?>">
        <input type="text" name="nome" value="<?php echo $cidade->getNome(); ?>" placeholder="Nome:" required>
        <br>
        <button type="submit">Salvar</button>
    </form>
    
</body>
</html>