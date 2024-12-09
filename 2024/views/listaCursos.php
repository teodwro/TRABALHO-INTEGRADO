<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de Estágio</title>
</head>
<body>

    <?php include("includes/menu.php"); ?>

    <h1>Sistema de Estágio - Cursos</h1>
    
    <?php if($_SESSION["usuario"]->getNivel() == 2) { ?>
        <a href="curso.php">Incluir nova</a>
    <?php } ?>
    
    <table>
        <tr>
            <th>ID</th>
            <th>Nome do Curso</th>
            <th>Professor do Curso</th>
            <?php if($_SESSION["usuario"]->getNivel() == 2) { ?>
            <th>Ações</th>
            <?php } ?>
        </tr>
        <?php foreach($cursos as $curso) { ?>
            <tr>
                <td><?php echo $curso->getId(); ?></td>
                <td><?php echo $curso->getNomeCurso(); ?></td>
                <td><?php echo $curso->getProfessorCurso(); ?></td>
                <?php if($_SESSION["usuario"]->getNivel() == 2) { ?>
                <td>
                    <a href="curso.php?id=<?php echo $curso->getId(); ?>">Editar</a>
                    <br>
                    <a href="excluirCurso.php?id=<?php echo $curso->getId(); ?>">Excluir</a>
                </td>
                <?php } ?>
            </tr>
        <?php } ?>
    </table>
</body>
</html>