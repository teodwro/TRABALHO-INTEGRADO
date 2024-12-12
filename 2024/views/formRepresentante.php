<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de Estágio - Adicionar Representantes</title>

    <?php include("includes/menu.php"); ?>

    <h1>Representante</h1>
    <a href="representantes.php" aria-label="Voltar para a lista de representantes">Voltar</a>

    <form action="salvarRepresentante.php" method="POST" aria-labelledby="form-titulo">
        <input type="hidden" name="id_representante" value="<?php echo $representante->getId(); ?>">

        <label for="nome_representante">Nome do Representante:</label>
        <input type="text" id="nome_representante" name="nome_representante" value="<?php echo $representante->getNomeRepresentante(); ?>" placeholder="Nome do Representante" required>

        <label for="funcao_representante">Função do Representante:</label>
        <input type="text" id="funcao_representante" name="funcao_representante" value="<?php echo $representante->getFuncaoRepresentante(); ?>" placeholder="Função do Representante" required>

        <label for="cpf_representante">CPF do Representante:</label>
        <input type="number" id="cpf_representante" name="cpf_representante" value="<?php echo $representante->getCpfRepresentante(); ?>" placeholder="CPF do Representante" required>

        <label for="rg_representante">RG do Representante:</label>
        <input type="number" id="rg_representante" name="rg_representante" value="<?php echo $representante->getRgRepresentante(); ?>" placeholder="RG do Representante" required>

        <label for="email_representante">Email do Representante:</label>
        <input type="email" id="email_representante" name="email_representante" value="<?php echo $representante->getEmailRepresentante(); ?>" placeholder="Email do Representante" required>

        <button type="submit" aria-label="Salvar representante">Salvar</button>
    </form>

</body>
</html>
