<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de Estágio - Estudantes</title>
<?php include("includes/menu.php"); ?>

<h1>Estudantes</h1>

<?php if($_SESSION["usuario"]->getNivel() == 2) { ?>
    <a href="estudante.php">Incluir novo</a>
<?php } ?>

<div class="table-container">
    <table>
        <thead>
            <tr>
                <th>Nome</th>
                <th>CPF</th>
                <th>RG</th>
                <th>Email</th>
                <th>Endereço</th>
                <th>Cidade</th>
                <th>Telefone</th>
                <th>Matrícula</th>
                <?php if($_SESSION["usuario"]->getNivel() == 2) { ?>
                <th>Ações</th>
                <?php } ?>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($estudantes as $estudante) { ?>
                <tr>
                    <td><?php echo $estudante->getNomeEstudante(); ?></td>
                    <td><?php echo $estudante->getCpf(); ?></td>
                    <td><?php echo $estudante->getRg(); ?></td>
                    <td><?php echo $estudante->getEmail(); ?></td>
                    <td><?php echo $estudante->getEndereco(); ?></td>
                    <td><?php echo $estudante->getCidadeId(); ?></td>
                    <td><?php echo $estudante->getTelefone(); ?></td>
                    <td><?php echo $estudante->getMatricula(); ?></td>
                    <?php if($_SESSION["usuario"]->getNivel() == 2) { ?>
                    <td>
                        <a href="estudante.php?id=<?php echo $estudante->getId(); ?>">Editar</a>
                        <br>
                        <a href="excluirEstudante.php?id=<?php echo $estudante->getId(); ?>">Excluir</a>
                    </td>
                    <?php } ?>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>

</body>

</html>