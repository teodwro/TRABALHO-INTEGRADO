<!DOCTYPE html>
<html lang="py-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema Acadêmico - Usuário</title>
</head>
<body>

    <?php include("includes/menu.php"); ?>

    <h1>Sistema Acadêmico - Usuário</h1>
    <a href="usuario.php">Inserir novo</a>

    <table>
        <thead>
            <th>ID</th>
            <th>Login</th>
            <th>Nível</th>
            <th>Ações</th>
        </thead>
        <?php foreach ($usuarios as $usuario) : ?>
            
            <tr>
                <td><?php echo $usuario->getId(); ?></td>
                <td><?php echo $usuario->getLogin(); ?></td>
                <td><?php echo $usuario->getNivel(); ?></td>
                <td>
                    <a href="usuario.php?id=<?php echo $usuario->getId(); ?>">Editar</a>
                    <a href="excluirUsuario.php?id=<?php echo $usuario->getId(); ?>">Exluir</a>
                </td>
            </tr>

        <?php endforeach ?>
    </table>
    
</body>
</html>