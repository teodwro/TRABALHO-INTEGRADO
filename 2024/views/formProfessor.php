<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de Estágio - Adicionar Professores</title>
</head>
<body>

    <?php include("includes/menu.php"); ?>

    <h1>Professores</h1>
    <a href="professores.php" aria-label="Voltar para a lista de professores">Voltar</a>

    <form action="salvarProfessor.php" method="POST" aria-labelledby="form-titulo">
        <input type="hidden" name="id" value="<?php echo $professor->getId(); ?>">

        <label for="nome_professor">Nome:</label>
        <input type="text" id="nome_professor" name="nome_professor" value="<?php echo $professor->getNomeProfessor(); ?>" placeholder="Nome do Professor" required>

        <label for="email_professor">Email:</label>
        <input type="email" id="email_professor" name="email_professor" value="<?php echo $professor->getEmailProfessor(); ?>" placeholder="Email do Professor" required>

        <button type="submit" aria-label="Salvar professor">Salvar</button>
    </form>

</body>
</html>
