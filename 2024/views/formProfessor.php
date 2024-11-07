<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de Estágio</title>
</head>
<body>

    <?php include("includes/menu.php"); ?>

    <h1>Sistema de Estágio - Professor</h1>
    <a href="professores.php">Voltar</a>
    <form action="salvarProfessor.php" method="POST">
        <input type="hidden" name="id" value="<?php echo $professor->getId(); ?>">
        <input type="text" name="nome_professor" value="<?php echo $professor->getNomeProfessor(); ?>" placeholder="Nome:" required>
        <input type="email" name="email_professor" value="<?php echo $professor->getEmailProfessor(); ?>" placeholder="Email:" required>
        <br>
        <button type="submit">Salvar</button>
    </form>
    
</body>
</html>