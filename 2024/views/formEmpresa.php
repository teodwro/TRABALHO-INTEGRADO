<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de Estágio</title>
</head>
<body>

    <?php include("includes/menu.php"); ?>

    <h1>Sistema de Estágio - Empresas</h1>
    <a href="empresas.php">Voltar</a>

    <?php if (empty($representantes)) {
        echo "<p>Adicione uma representante antes! </p>";
    } else { ?>

    <form action="salvarEmpresa.php" method="POST">
        <input type="hidden" name="id_empresa" value="<?php echo $empresa->getId(); ?>">
        <input type="text" name="nome_empresa" value="<?php echo $empresa->getNomeEmpresa(); ?>" placeholder="Nome da Empresa:" required> <br>
        <input type="text" name="endereco_empresa" value="<?php echo $empresa->getEnderecoEmpresa(); ?>" placeholder="Endereço da Empresa:" required> <br>
        <input type="number" name="telefone_empresa" value="<?php echo $empresa->getTelefoneEmpresa(); ?>" placeholder="Telefone da Empresa:" required> <br>
        <input type="email" name="email_empresa" value="<?php echo $empresa->getEmailEmpresa(); ?>" placeholder="Email da Empresa:" required> <br>
        <input type="number" name="cnpj_empresa" value="<?php echo $empresa->getCnpjEmpresa(); ?>" placeholder="CNPJ da Empresa:" required> <br>
        <select name="representante_empresa" id="">
        <?php foreach($representantes as $representante){ ?>
                <option value="<?php echo $representante->getId() ?>"><?php echo $representante->getNomeRepresentante() ?></option>    
        <?php } ?>
        </select>
        <button type="submit">Salvar</button>
    </form>
    
    <?php } ?>
</body>
</html>
