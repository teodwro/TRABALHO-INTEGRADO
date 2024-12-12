<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de Estágio - Adicionar Estágio</title>
</head>
<body>

    <?php include("includes/menu.php"); ?>

    <h1>Estágios</h1>
    <a href="estagios.php" aria-label="Voltar para a lista de estágios">Voltar</a>

    <?php if (empty($estudantes) || empty($professores) || empty($cursos) || empty($empresas)) { ?>
        <p>Adicione os itens necessários antes, são eles, estudante, professor, curso e empresa!</p>
    <?php } else { ?>

    <form action="salvarEstagio.php" method="POST" aria-labelledby="form-titulo" enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?php echo $estagio->getId(); ?>">

        <label for="estudante_estagio">Estudante:</label>
        <select name="estudante_estagio" id="estudante_estagio" required>
            <?php foreach ($estudantes as $estudante) { ?>
                <option value="<?php echo $estudante->getId(); ?>"><?php echo $estudante->getNomeEstudante(); ?></option>    
            <?php } ?>
        </select>

        <label for="curso_estagio">Curso:</label>
        <select name="curso_estagio" id="curso_estagio" required>
            <?php foreach ($cursos as $curso) { ?>
                <option value="<?php echo $curso->getId(); ?>"><?php echo $curso->getNomeCurso(); ?></option>    
            <?php } ?>
        </select>
        
        <label for="professor_orientador">Professor Orientador:</label>
        <select name="professor_orientador" id="professor_orientador" required>
            <?php foreach ($professores as $professor) { ?>
                <option value="<?php echo $professor->getId(); ?>"><?php echo $professor->getNomeProfessor(); ?></option> 
            <?php } ?>   
        </select>

        <label for="professor_coorientador">Professor Coorientador:</label>
        <select name="professor_coorientador" id="professor_coorientador">
            <?php foreach ($professores as $professor) { ?>
                <option value="<?php echo $professor->getId(); ?>"><?php echo $professor->getNomeProfessor(); ?></option>    
            <?php } ?>
        </select>

        <label for="empresa_estagio">Empresa:</label>
        <select name="empresa_estagio" id="empresa_estagio" required>
            <?php foreach ($empresas as $empresa) { ?>
                <option value="<?php echo $empresa->getId(); ?>"><?php echo $empresa->getNomeEmpresa(); ?></option>    
            <?php } ?>
        </select>

        <label for="encaminhamentos_estagio">Encaminhamentos Seções do Estágio:</label>
        <input type="text" id="encaminhamentos_estagio" name="encaminhamentos_estagio" value="<?php echo $estagio->getEncaminhamentosSecoesEstagio(); ?>">

        <label for="plano_atividades">Plano de Atividades:</label>
        <input type="file" id="plano_atividades" name="plano_atividades">

        <label for="relatorio_final">Relatório Final:</label>
        <input type="file" id="relatorio_final" name="relatorio_final">

        <label for="ficha_autoavaliacao">Ficha de Autoavaliação:</label>
        <input type="file" id="ficha_autoavaliacao" name="ficha_autoavaliacao">

        <label for="ficha_avaliacao_empresa">Ficha de Avaliação da Empresa:</label>
        <input type="file" id="ficha_avaliacao_empresa" name="ficha_avaliacao_empresa">

        <label for="termo_compromisso">Termo de Compromisso:</label>
        <input type="file" id="termo_compromisso" name="termo_compromisso">

        <label for="supervisor_empresa">Supervisor da Empresa:</label>
        <input type="text" id="supervisor_empresa" name="supervisor_empresa" value="<?php echo $estagio->getSupervisorEmpresa(); ?>" placeholder="Nome do Supervisor" required>

        <label for="cargo_formacao_supervisor">Cargo/ Formação do Supervisor:</label>
        <input type="text" id="cargo_formacao_supervisor" name="cargo_formacao_supervisor" value="<?php echo $estagio->getCargoFormacaoSupervisor(); ?>" placeholder="Cargo ou Formação do Supervisor">

        <label for="telefone_supervisor_empresa">Telefone do Supervisor:</label>
        <input type="tel" id="telefone_supervisor_empresa" name="telefone_supervisor_empresa" value="<?php echo $estagio->getTelefoneSupervisorEmpresa(); ?>" placeholder="Telefone do Supervisor">

        <label for="email_supervisor_empresa">Email do Supervisor:</label>
        <input type="email" id="email_supervisor_empresa" name="email_supervisor_empresa" value="<?php echo $estagio->getEmailSupervisorEmpresa(); ?>" placeholder="Email do Supervisor">

        <label for="numero_convenio">Número do Convênio:</label>
        <input type="text" id="numero_convenio" name="numero_convenio" value="<?php echo $estagio->getNumeroConvenio(); ?>" placeholder="Número do Convênio">

        <label for="tipo_processo">Tipo de Processo:</label>
        <input type="text" id="tipo_processo" name="tipo_processo" value="<?php echo $estagio->getTipoProcesso(); ?>" placeholder="Tipo de Processo">

        <label for="status_processo">Status do Processo:</label>
        <input type="text" id="status_processo" name="status_processo" value="<?php echo $estagio->getStatusProcesso(); ?>" placeholder="Status do Processo">

        <label for="carga_horaria">Carga Horária:</label>
        <input type="text" id="carga_horaria" name="carga_horaria" value="<?php echo $estagio->getCargaHoraria(); ?>" placeholder="Carga Horária">

        <label for="periodo_estagio_inicio">Período de Estágio - Início:</label>
        <input type="date" id="periodo_estagio_inicio" name="periodo_estagio_inicio" value="<?php echo $estagio->getPeriodoEstagioInicio(); ?>" placeholder="Início do Estágio">

        <label for="periodo_estagio_fim">Período de Estágio - Fim:</label>
        <input type="date" id="periodo_estagio_fim" name="periodo_estagio_fim" value="<?php echo $estagio->getPeriodoEstagioFim(); ?>" placeholder="Fim do Estágio">

        <button type="submit" aria-label="Salvar estágio">Salvar</button>
    </form>

    <?php } ?>
    
</body>
</html>
