<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de Estágio - Representantes</title>
</head>

<body>

    <?php include("includes/menu.php"); ?>

    <h1>Sistema de Estágio - Representantes</h1>
    
    <?php if($_SESSION["usuario"]->getNivel() == 2) { ?>
    <a href="representante.php">Incluir novo representante</a>
    <?php } ?>

    <table>
        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>Função</th>
            <th>CPF</th>
            <th>RG</th>
            <th>Email</th>
            <th>Ações</th>
        </tr>
        <?php foreach ($representantes as $representante) { ?>
            <tr>
                <td><?php echo $representante->getId(); ?></td>
                <td><?php echo $representante->getNomeRepresentante(); ?></td>
                <td><?php echo $representante->getFuncaoRepresentante(); ?></td>
                <td><?php echo $representante->getCpfRepresentante(); ?></td>
                <td><?php echo $representante->getRgRepresentante(); ?></td>
                <td><?php echo $representante->getEmailRepresentante(); ?></td>

                <td>
                    <a href="representante.php?id=<?php echo $representante->getId(); ?>">Editar</a>
                    <br>
                    <a href="excluirRepresentante.php?id=<?php echo $representante->getId(); ?>">Excluir</a>
                </td>
            </tr>
        <?php } ?>
    </table>
</body>

</html>
