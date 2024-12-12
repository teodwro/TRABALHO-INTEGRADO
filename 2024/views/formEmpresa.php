<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de Estágio - Adicionar Empresas</title>

    <?php include("includes/menu.php"); ?>

    <h1>Empresas</h1>
    <a href="empresas.php" aria-label="Voltar para a lista de empresas">Voltar</a>

    <?php if (empty($representantes)) { ?>
        <p>Adicione um representante antes!</p>
    <?php } else { ?>

    <form action="salvarEmpresa.php" method="POST" aria-labelledby="form-titulo">
        <input type="hidden" name="id_empresa" value="<?php echo $empresa->getId(); ?>">

        <label for="nome_empresa">Nome da Empresa:</label>
        <input type="text" id="nome_empresa" name="nome_empresa" value="<?php echo $empresa->getNomeEmpresa(); ?>" placeholder="Nome da Empresa" required>

        <label for="endereco_empresa">Endereço da Empresa:</label>
        <input type="text" id="endereco_empresa" name="endereco_empresa" value="<?php echo $empresa->getEnderecoEmpresa(); ?>" placeholder="Endereço da Empresa" required>

        <label for="telefone_empresa">Telefone da Empresa:</label>
        <input type="number" id="telefone_empresa" name="telefone_empresa" value="<?php echo $empresa->getTelefoneEmpresa(); ?>" placeholder="Telefone da Empresa" required>

        <label for="email_empresa">Email da Empresa:</label>
        <input type="email" id="email_empresa" name="email_empresa" value="<?php echo $empresa->getEmailEmpresa(); ?>" placeholder="Email da Empresa" required>

        <label for="cnpj_empresa">CNPJ da Empresa:</label>
        <input type="number" id="cnpj_empresa" name="cnpj_empresa" value="<?php echo $empresa->getCnpjEmpresa(); ?>" placeholder="CNPJ da Empresa" required>

        <label for="representante_empresa">Representante da Empresa:</label>
        <select name="representante_empresa" id="representante_empresa" required>
            <option value="0" disabled selected>Selecione uma opção</option>
            <?php foreach($representantes as $representante){ ?>
                <option value="<?php echo $representante->getId(); ?>"><?php echo $representante->getNomeRepresentante(); ?></option>    
            <?php } ?>
        </select>

        <button type="submit" aria-label="Salvar empresa">Salvar</button>
    </form>

    <?php } ?>
</body>
</html>
