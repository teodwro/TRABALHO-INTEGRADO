<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de Estágio - Adicionar Estudantes</title>

    <?php include("includes/menu.php"); ?>

    <h1>Estudantes</h1>
    <a href="estudantes.php" aria-label="Voltar para a lista de estudantes">Voltar</a>

    <?php if (empty($cidades)) { ?>
        <p>Adicione uma cidade antes!</p>
    <?php } else { ?>

    <form action="salvarEstudante.php" method="POST" aria-labelledby="form-titulo">
        <input type="hidden" name="id" value="<?php echo $estudante->getId(); ?>">

        <label for="nome_estudante">Nome:</label>
        <input type="text" id="nome_estudante" name="nome_estudante" value="<?php echo $estudante->getNomeEstudante(); ?>" placeholder="Nome do Estudante" required>

        <label for="cpf">CPF:</label>
        <input type="number" id="cpf" name="cpf" value="<?php echo $estudante->getCpf(); ?>" placeholder="CPF" required>

        <label for="rg">RG:</label>
        <input type="number" id="rg" name="rg" value="<?php echo $estudante->getRg(); ?>" placeholder="RG" required>

        <label for="email">Email:</label>
        <input type="text" id="email" name="email" value="<?php echo $estudante->getEmail(); ?>" placeholder="Email" required>

        <label for="endereco">Endereço:</label>
        <input type="text" id="endereco" name="endereco" value="<?php echo $estudante->getEndereco(); ?>" placeholder="Endereço" required>

        <label for="cidade_id">Cidade:</label>
        <select name="cidade_id" id="cidade_id" required>
           <?php foreach($cidades as $cidade){ ?>
                <option value="<?php echo $cidade->getId() ?>"><?php echo $cidade->getNome() ?></option>    
            <?php } ?>
        </select> 

        <label for="telefone">Telefone:</label>
        <input type="number" id="telefone" name="telefone" value="<?php echo $estudante->getTelefone(); ?>" placeholder="Telefone" required>

        <label for="matricula">Matrícula:</label>
        <input type="number" id="matricula" name="matricula" value="<?php echo $estudante->getMatricula(); ?>" placeholder="Matrícula" required>

        <button type="submit" aria-label="Salvar estudante">Salvar</button>
    </form>

    <?php } ?>
    
</body>
</html>
