<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de Estágio - Cidades</title>

<?php include("includes/menu.php"); ?>

<h1>Cidades</h1>

<?php if($_SESSION["usuario"]->getNivel() == 2) { ?>
    <a href="cidade.php">Incluir nova</a>
<?php } ?>

<div class="table-container">
    <table>
        <thead>
            <tr>
                <th>Nome</th>
                <?php if($_SESSION["usuario"]->getNivel() == 2) { ?>
                <th>Ações</th>
                <?php } ?>
            </tr>
        </thead>
        <tbody>
            <?php foreach($cidades as $cidade) { ?>
                <tr>
                    <td><?php echo $cidade->getNome(); ?></td>
                    <?php if($_SESSION["usuario"]->getNivel() == 2) { ?>
                    <td>
                        <a href="cidade.php?id=<?php echo $cidade->getId(); ?>">Editar</a>
                        <br>
                        <a href="excluirCidade.php?id=<?php echo $cidade->getId(); ?>">Excluir</a>
                    </td>
                    <?php } ?>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>
</body>
</html>