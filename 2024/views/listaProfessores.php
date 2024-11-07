<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de Estágio</title>
</head>
<body>

    <?php include("includes/menu.php"); ?>

    <h1>Sistema de Estágio - Professor</h1>
    
    <?php if($_SESSION["usuario"]->getNivel() == 2) { ?>
        <a href="professor.php">Incluir nova</a>
    <?php } ?>
    
    <table>
        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>Email</th>
            <?php if($_SESSION["usuario"]->getNivel() == 2) { ?>
            <th>Ações</th>
            <?php } ?>
        </tr>
        <?php foreach($professores as $professor) { ?>
            <tr>
                <td><?php echo $professor->getId(); ?></td>
                <td><?php echo $professor->getNomeProfessor(); ?></td>
                <td><?php echo $professor->getEmailProfessor(); ?></td>
                <?php if($_SESSION["usuario"]->getNivel() == 2) { ?>
                <td>
                    <a href="professor.php?id=<?php echo $professor->getId(); ?>">Editar</a>
                    <br>
                    <a href="excluirProfessor.php?id=<?php echo $professor->getId(); ?>">Excluir</a>
                </td>
                <?php } ?>
            </tr>
        <?php } ?>
    </table>
</body>
</html>