<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de Estágio</title>
</head>
<body>

    <?php include("includes/menu.php"); ?>

    <h1>Sistema de Estágio - Representante</h1>
    <a href="empresas.php">Voltar</a>
    <form action="salvarRepresentante.php" method="POST">
        <input type="hidden" name="id_representante" value="<?php echo $representante->getId(); ?>">
        <input type="text" name="nome_representante" value="<?php echo $representante->getNomeRepresentante(); ?>" placeholder="Nome do Representante:" required> <br>
        <input type="text" name="funcao_representante" value="<?php echo $representante->getFuncaoRepresentante(); ?>" placeholder="Função do Representante:" required> <br>
        <input type="number" name="cpf_representante" value="<?php echo $representante->getCpfRepresentante(); ?>" placeholder="CPF do Representante:" required> <br>
        <input type="number" name="rg_representante" value="<?php echo $representante->getRgRepresentante(); ?>" placeholder="RG do Representante:" required> <br>
        <input type="email" name="email_representante" value="<?php echo $representante->getEmailRepresentante(); ?>" placeholder="Email do Representante:" required> <br>

        <button type="submit">Salvar</button>
    </form>
    
</body>
</html>
