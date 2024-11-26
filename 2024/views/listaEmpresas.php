<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de Estágio</title>
</head>
<body>

    <?php include("includes/menu.php"); ?>

    <h1>Sistema de Estágio - Empresas</h1>

    <?php if($_SESSION["usuario"]->getNivel() == 2) { ?>
        <a href="empresa.php">Incluir nova</a>
    <?php } ?>
    
    <table>
        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>Endereço</th>
            <th>Telefone</th>
            <th>Email</th>
            <th>Cnpj</th>
            <th>Representante</th>
            <?php if($_SESSION["usuario"]->getNivel() == 2) { ?>
            <th>Ações</th>
            <?php } ?>
        </tr>
        <?php foreach($empresas as $empresa) { ?>
            <tr>
                <td><?php echo $empresa->getId(); ?></td>
                <td><?php echo $empresa->getNomeEmpresa(); ?></td>
                <td><?php echo $empresa->getEnderecoEmpresa(); ?></td>
                <td><?php echo $empresa->getTelefoneEmpresa(); ?></td>
                <td><?php echo $empresa->getEmailEmpresa(); ?></td>
                <td><?php echo $empresa->getCnpjEmpresa(); ?></td>
                <td><?php echo $empresa->getRepresentanteEmpresa(); ?></td>
                <?php if($_SESSION["usuario"]->getNivel() == 2) { ?>
                <td>
                    <a href="empresa.php?id=<?php echo $empresa->getId(); ?>">Editar</a>
                    <br>
                    <a href="excluirEmpresa.php?id=<?php echo $empresa->getId(); ?>">Excluir</a>
                </td>
                <?php } ?>
            </tr>
        <?php } ?>
    </table>
</body>
</html>