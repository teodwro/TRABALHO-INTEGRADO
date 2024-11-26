<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de Estágio</title>
</head>
<body>

    <?php include("includes/menu.php"); ?>

    <h1>Sistema de Estágio - Estudantes</h1>

    <a href="estudantes.php">Voltar</a>

    <?php if (empty($cidades)) {
        echo "<p>Adicione uma cidade antes! </p>";
    } else { ?>

    <form action="salvarEstudante.php" method="POST">
        <input type="hidden" name="id" value="<?php echo $estudante->getId(); ?>">
        <input type="text" name="nome_estudante" value="<?php echo $estudante->getNomeEstudante(); ?>" placeholder="Nome:" required> <br>
        <input type="number" name="cpf" value="<?php echo $estudante->getCpf(); ?>" placeholder="CPF:" required> <br>
        <input type="number" name="rg" value="<?php echo $estudante->getRg(); ?>" placeholder="RG:" required> <br>
        <input type="text" name="email" value="<?php echo $estudante->getEmail(); ?>" placeholder="Email:" required> <br>
        <input type="text" name="endereco" value="<?php echo $estudante->getEndereco(); ?>" placeholder="Endereço:" required> <br>

        <select name="cidade_id" id="cidade_id">
           <?php foreach($cidades as $cidade){ ?>
                <option value="<?php echo $cidade->getId() ?>"><?php echo $cidade->getNome() ?></option>    
            <?php } ?>
        </select> <br>
        
        <input type="number" name="telefone" value="<?php echo $estudante->getTelefone(); ?>" placeholder="Telefone:" required> <br>
        <input type="number" name="matricula" value="<?php echo $estudante->getMatricula(); ?>" placeholder="Matrícula:" required> <br>

        <button type="submit">Salvar</button>
    </form>

    <?php } ?>
    
</body>
</html>