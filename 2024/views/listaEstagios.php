<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de Estágio - Estágios</title>
</head>
<body>

    <?php include("includes/menu.php"); ?>

    <h1>Estágios</h1>
    
    <?php if($_SESSION["usuario"]->getNivel() == 2) { ?>
        <a href="estagio.php">Incluir novo</a>
    <?php } ?>
    
    <table>
        <tr>
            <th>ID Estágio</th>
            <th>Estudante</th>
            <th>Curso</th>
            <th>Professor Orientador</th>
            <th>Professor Coorientador</th>
            <th>Encaminhamentos</th>
            <th>Plano Atividades</th>
            <th>Relatório Final</th>
            <th>Auto Avaliação</th>
            <th>Avaliação Empresa</th>
            <th>Termo Compromisso</th>
            <th>Supervisor Empresa</th>
            <th>Formação supervisor</th>
            <th>Telefone Super</th>




            <?php if($_SESSION["usuario"]->getNivel() == 2) { ?>
            <th>Ações</th>
            <?php } ?>
        </tr>
        <?php foreach($estagios as $estagio) { ?>
            <tr>
                <td><?php echo $estagio->getId(); ?></td>
                <td><?php echo $estagio->getNome(); ?></td>
                <?php if($_SESSION["usuario"]->getNivel() == 2) { ?>
                <td>
                    <a href="estagio.php?id=<?php echo $estagio->getIdEstagio(); ?>">Editar</a>
                    <br>
                    <a href="excluirEstagio.php?id=<?php echo $estagio->getIdEstagio(); ?>">Excluir</a>
                </td>
                <?php } ?>
            </tr>
        <?php } ?>
    </table>
</body>
</html>