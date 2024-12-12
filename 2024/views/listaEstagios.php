<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de Estágio - Estágios</title>

<?php include("includes/menu.php"); ?>

<h1>Estágios</h1>
<div class="btns-estagio">
    <a href="filtro.php">Filtrar Estágios</a>
    
    <?php if($_SESSION["usuario"]->getNivel() == 2) { ?>
        <a href="estagio.php">Incluir novo</a>
    <?php } ?>
    </div>
<div class="table-container">
    
    <table>
        <thead>
            <tr>
                <th>Estudante</th>
                <th>Curso</th>
                <th>Professor Orientador</th>
                <th>Professor Coorientador</th>
                <th>Empresa do Estágio</th>
                <th>Número de Convênio da Empresa</th>
                <th>Encaminhamentos</th>
                <th class="mostrar">Documentos</th>
                <th class="mostrar">Informações Supervisor</th>
                <th class="mostrar">Informações e datas do Estágio</th>
                <?php if($_SESSION["usuario"]->getNivel() == 2) { ?>
                    <th>Ações</th>
                <?php } ?>
            </tr>
        </thead>
        <tbody>
            <?php foreach($estagios as $index => $estagio) { ?>
                <tr>
                    <td><?php echo $estagio->getEstudanteEstagio(); ?></td>
                    <td><?php echo $estagio->getCursoEstagio(); ?></td>
                    <td><?php echo $estagio->getProfessorOrientador(); ?></td>
                    <td><?php echo $estagio->getProfessorCoorientador(); ?></td>
                    <td><?php echo $estagio->getEmpresaEstagio(); ?></td>
                    <td><?php echo $estagio->getNumeroConvenio() ; ?></td>
                    <td><?php echo $estagio->getEncaminhamentosSecoesEstagio(); ?></td>
                    <td class="mostrar"><button class="documentos-toggle" data-index="<?php echo $index; ?>">Mostrar mais</button></td>
                    <td class="mostrar"><button class="supervisor-toggle" data-index="<?php echo $index; ?>">Mostrar mais</button></td>
                    <td class="mostrar"><button class="estagio-toggle" data-index="<?php echo $index; ?>">Mostrar mais</button></td>

                    <?php if($_SESSION["usuario"]->getNivel() == 2) { ?>
                        <td>
                            <a href="estagio.php?id=<?php echo $estagio->getId(); ?>">Editar</a>
                            <br>
                            <a href="excluirEstagio.php?id=<?php echo $estagio->getId(); ?>">Excluir</a>
                        </td>
                    <?php } ?>
                </tr>

                <tr class="informacoes documentos-<?php echo $index; ?>" style="display: none;">
                    <td colspan="11">
                        <div class="informacoes-box">
                            <h3>Documentos do Estágio:</h3>
                            <ul>
                                <li>Plano Atividades: <?php if($estagio->getPlanoAtividades()) { ?> <a href="uploads/<?php echo $estagio->getPlanoAtividades() ?>">Ver Documento</a> <?php } ?></li>
                                <li>Relatório Final: <?php if($estagio->getRelatorioFinal()) { ?> <a href="uploads/<?php echo $estagio->getRelatorioFinal() ?>">Ver Documento</a> <?php } ?></li>
                                <li>Ficha Auto Avaliação: <?php if($estagio->getFichaAutoavaliacao()) { ?> <a href="uploads/<?php echo $estagio->getFichaAutoavaliacao() ?>">Ver Documento</a> <?php } ?></li>
                                <li>Ficha Avaliação Empresa: <?php if($estagio->getFichaAvaliacaoEmpresa()) { ?> <a href="uploads/<?php echo $estagio->getFichaAvaliacaoEmpresa() ?>">Ver Documento</a> <?php } ?></li>
                                <li>Termo de Compromisso: <?php if($estagio->getTermoCompromisso()) { ?> <a href="uploads/<?php echo $estagio->getTermoCompromisso() ?>">Ver Documento</a> <?php } ?></li>
                            </ul>
                        </div>
                    </td>
                </tr>

                <tr class="informacoes supervisor-<?php echo $index; ?>" style="display: none;">
                    <td colspan="11">
                        <div class="informacoes-box">
                            <h3>Informações do Supervisor:</h3>
                            <ul>
                                <li>Supervisor Empresa: <?php echo $estagio->getSupervisorEmpresa(); ?></li>
                                <li>Formação supervisor: <?php echo $estagio->getCargoFormacaoSupervisor(); ?></li>
                                <li>Telefone Supervisor: <?php echo $estagio->getTelefoneSupervisorEmpresa(); ?></li>
                                <li>Email Supervisor: <?php echo $estagio->getEmailSupervisorEmpresa() ; ?></li>
                            </ul>
                        </div>
                    </td>
                </tr>

                <tr class="informacoes estagio-<?php echo $index; ?>" style="display: none;">
                    <td colspan="11">
                        <div class="informacoes-box">
                            <h3>Informações do Estágio:</h3>
                            <ul>
                                <li>Tipo do Processo: <?php echo $estagio->getTipoProcesso() ; ?></li>
                                <li>Status Processo: <?php echo $estagio->getStatusProcesso() ; ?></li>
                                <li>Carga Horária: <?php echo $estagio->getCargaHoraria() ; ?></li>
                                <li>Período do Início: <?php echo $estagio->getPeriodoEstagioInicio() ; ?></li>
                                <li>Período do Fim: <?php echo $estagio->getPeriodoEstagioFim() ; ?></li>
                            </ul>
                        </div>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        const toggleVisibility = (buttons, classPrefix) => {
            buttons.forEach(button => {
                button.addEventListener("click", function() {
                    const index = button.getAttribute("data-index");
                    const infoRow = document.querySelector(`.${classPrefix}-${index}`);
                    if (infoRow.style.display === "none" || infoRow.style.display === "") {
                        infoRow.style.display = "table-row";
                        button.textContent = "Mostrar menos";
                    } else {
                        infoRow.style.display = "none";
                        button.textContent = "Mostrar mais";
                    }
                });
            });
        };

        toggleVisibility(document.querySelectorAll(".documentos-toggle"), "documentos");
        toggleVisibility(document.querySelectorAll(".supervisor-toggle"), "supervisor");
        toggleVisibility(document.querySelectorAll(".estagio-toggle"), "estagio");
    });
</script>

</body>
</html>
