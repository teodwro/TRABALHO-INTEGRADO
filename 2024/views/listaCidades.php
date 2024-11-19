<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de Estágio</title>
</head>
<body>
    <h1>Sistema de Estágio - Cidades</h1>
    <a href="cidade.php">Incluir nova</a>
    <table>
        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>Ações</th>
        </tr>
        <?php foreach($cidades as $cidade) { ?>
            <tr>
                <td><?php echo $cidade->getId(); ?></td>
                <td><?php echo $cidade->getNome(); ?></td>
                <td>
                    <a href="cidade.php?id=<?php echo $cidade->getId(); ?>">Editar</a>
                    <br>
                    <a href="excluirCidade.php?id=<?php echo $cidade->getId(); ?>">Excluir</a>
                </td>
            </tr>
        <?php } ?>
    </table>
</body>
</html>