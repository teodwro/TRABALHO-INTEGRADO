<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de Estágio - Estágios</title>
</head>
<body>

    <?php include("includes/menu.php"); ?>

    <h1>Estágios</h1>
    
    <?php if($_SESSION["usuario"]->getNivel() == 2) { ?>
        <a href="estagio.php">Incluir novo</a>
    <?php } ?>
    
    <table>
        <tr>
            <th>ID Estágio</th>
            <th>Estudante</th>
            <th>Curso</th>
            <th>Professor Orientador</th>
            <th>Professor Coorientador</th>
            <th>Empresa do Estágio</th>
            <th>Encaminhamentos</th>
            <th>Plano Atividades</th>
            <th>Relatório Final</th>
            <th>Auto Avaliação</th>
            <th>Avaliação Empresa</th>
            <th>Termo Compromisso</th>
            <th>Supervisor Empresa</th>
            <th>Formação supervisor</th>
            <th>Telefone Supervisor</th>
            <th>Email Supervisor</th>
            <th>Número de Convênio da Empresa</th>
            <th>Tipo do Processo</th>
            <th>Status Processo</th>
            <th>Carga Horária</th>
            <th>Período de Início do Estágio</th>
            <th>Período de Final do Estágio</th>
            <?php if($_SESSION["usuario"]->getNivel() == 2) { ?>
            <th>Ações</th>
            <?php } ?>
        </tr>
        <?php foreach($estagios as $estagio) { ?>
            <tr>
                <td><?php echo $estagio->getId(); ?></td>
                <td><?php echo $estagio->getEstudanteEstagio(); ?></td>
                <td><?php echo $estagio->getCursoEstagio(); ?></td>
                <td><?php echo $estagio->getProfessorOrientador(); ?></td>
                <td><?php echo $estagio->getProfessorCoorientador(); ?></td>
                <td><?php echo $estagio->getEmpresaEstagio(); ?></td>
                <td><?php echo $estagio->getEncaminhamentosSecoesEstagio(); ?></td>
                <td>
                <?php if($estagio->getPlanoAtividades()) { ?>
                    <a href="uploads/<?php echo $estagio->getPlanoAtividades() ?>">Ver Documento</a>
                <?php } ?>
                </td>
                <td>
                <?php if($estagio->getRelatorioFinal()) { ?>
                    <a href="uploads/<?php echo $estagio->getRelatorioFinal() ?>">Ver Documento </a>
                <?php } ?>
                </td>
                <td>
                <?php if($estagio->getFichaAutoavaliacao()) { ?>
                    <a href="uploads/<?php echo $estagio->getFichaAutoavaliacao() ?>">Ver Documento </a>
                <?php } ?>
                </td>
                <td>
                <?php if($estagio->getFichaAvaliacaoEmpresa()) { ?>
                    <a href="uploads/<?php echo $estagio->getFichaAvaliacaoEmpresa() ?>">Ver Documento </a>
                <?php } ?>
                </td>
                <td>
                <?php if($estagio->getTermoCompromisso()) { ?>
                    <a href="uploads/<?php echo $estagio->getTermoCompromisso() ?>">Ver Documento </a>
                <?php } ?>
                </td>
                <td><?php echo $estagio->getSupervisorEmpresa(); ?></td>
                <td><?php echo $estagio->getCargoFormacaoSupervisor(); ?></td>
                <td><?php echo $estagio->getTelefoneSupervisorEmpresa(); ?></td>
                <td><?php echo $estagio->getEmailSupervisorEmpresa() ; ?></td>
                <td><?php echo $estagio->getNumeroConvenio() ; ?></td>
                <td><?php echo $estagio->getTipoProcesso() ; ?></td>
                <td><?php echo $estagio->getStatusProcesso() ; ?></td>
                <td><?php echo $estagio->getCargaHoraria() ; ?></td>
                <td><?php echo $estagio->getPeriodoEstagioInicio() ; ?></td>
                <td><?php echo $estagio->getPeriodoEstagioFim() ; ?></td>

                <?php if($_SESSION["usuario"]->getNivel() == 2) { ?>
                <td>
                    <a href="estagio.php?id=<?php echo $estagio->getId(); ?>">Editar</a>
                    <br>
                    <a href="excluirEstagio.php?id=<?php echo $estagio->getId(); ?>">Excluir</a>
                </td>
                <?php } ?>
            </tr>
        <?php } ?>
    </table>
</body>
</html>