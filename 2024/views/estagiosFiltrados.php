<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de Estágio - Estágios</title>

<?php include("includes/menu.php"); ?>

<h1>Estágios Filtrados</h1>
<div class="btns-estagio">
    <a href="estagios.php">Voltar</a>
    
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
        <?php foreach($estagios['estagios'] as $index => $estagio) { ?>
    <tr>
        <td><?php echo isset($estagio['nome_estudante']) ? $estagio['nome_estudante'] : ''; ?></td>
        <td><?php echo isset($estagio['nome_curso']) ? $estagio['nome_curso'] : 'N/A'; ?></td>
        <td><?php echo isset($estagio['orientador_nome']) ? $estagio['orientador_nome'] : ''; ?></td>
        <td><?php echo isset($estagio['professor_coorientador']) ? $estagio['professor_coorientador'] : ''; ?></td>
        <td><?php echo isset($estagio['empresa_estagio']) ? $estagio['empresa_estagio'] : ''; ?></td>
        <td><?php echo isset($estagio['numero_convenio']) ? $estagio['numero_convenio'] : ''; ?></td>
        <td><?php echo isset($estagio['encaminhamentos_secoes_estagio']) ? $estagio['encaminhamentos_secoes_estagio'] : ''; ?></td>
        <td class="mostrar"><button class="documentos-toggle" data-index="<?php echo $index; ?>">Mostrar mais</button></td>
        <td class="mostrar"><button class="supervisor-toggle" data-index="<?php echo $index; ?>">Mostrar mais</button></td>
        <td class="mostrar"><button class="estagio-toggle" data-index="<?php echo $index; ?>">Mostrar mais</button></td>

        <?php if($_SESSION["usuario"]->getNivel() == 2) { ?>
            <td>
                <a href="estagio.php?id=<?php echo $estagio['id_estagio']; ?>">Editar</a>
                <br>
                <a href="excluirEstagio.php?id=<?php echo $estagio['id_estagio']; ?>">Excluir</a>
            </td>
        <?php } ?>
    </tr>

    <tr class="informacoes documentos-<?php echo $index; ?>" style="display: none;">
        <td colspan="10">
            <div class="informacoes-box">
                <h3>Documentos do Estágio:</h3>
                <ul>
                    <li>Plano Atividades: <?php if(isset($estagio['plano_atividades']) && $estagio['plano_atividades']) { ?> <a href="uploads/<?php echo $estagio['plano_atividades']; ?>">Ver Documento</a> <?php } ?></li>
                    <li>Relatório Final: <?php if(isset($estagio['relatorio_final']) && $estagio['relatorio_final']) { ?> <a href="uploads/<?php echo $estagio['relatorio_final']; ?>">Ver Documento</a> <?php } ?></li>
                    <li>Ficha Auto Avaliação: <?php if(isset($estagio['ficha_autoavaliacao']) && $estagio['ficha_autoavaliacao']) { ?> <a href="uploads/<?php echo $estagio['ficha_autoavaliacao']; ?>">Ver Documento</a> <?php } ?></li>
                    <li>Ficha Avaliação Empresa: <?php if(isset($estagio['ficha_avaliacao_empresa']) && $estagio['ficha_avaliacao_empresa']) { ?> <a href="uploads/<?php echo $estagio['ficha_avaliacao_empresa']; ?>">Ver Documento</a> <?php } ?></li>
                    <li>Termo de Compromisso: <?php if(isset($estagio['termo_compromisso']) && $estagio['termo_compromisso']) { ?> <a href="uploads/<?php echo $estagio['termo_compromisso']; ?>">Ver Documento</a> <?php } ?></li>
                </ul>
            </div>
        </td>
    </tr>

    <tr class="informacoes supervisor-<?php echo $index; ?>" style="display: none;">
        <td colspan="10">
            <div class="informacoes-box">
                <h3>Informações do Supervisor:</h3>
                <ul>
                    <li>Supervisor Empresa: <?php echo isset($estagio['supervisor_empresa']) ? $estagio['supervisor_empresa'] : 'N/A'; ?></li>
                    <li>Formação supervisor: <?php echo isset($estagio['cargo_formacao_supervisor']) ? $estagio['cargo_formacao_supervisor'] : 'N/A'; ?></li>
                    <li>Telefone Supervisor: <?php echo isset($estagio['telefone_supervisor_empresa']) ? $estagio['telefone_supervisor_empresa'] : 'N/A'; ?></li>
                    <li>Email Supervisor: <?php echo isset($estagio['email_supervisor_empresa']) ? $estagio['email_supervisor_empresa'] : 'N/A'; ?></li>
                </ul>
            </div>
        </td>
    </tr>

    <tr class="informacoes estagio-<?php echo $index; ?>" style="display: none;">
        <td colspan="10">
            <div class="informacoes-box">
                <h3>Informações do Estágio:</h3>
                <ul>
                    <li>Tipo do Processo: <?php echo isset($estagio['tipo_processo']) ? $estagio['tipo_processo'] : 'N/A'; ?></li>
                    <li>Status Processo: <?php echo isset($estagio['status_processo']) ? $estagio['status_processo'] : 'N/A'; ?></li>
                    <li>Carga Horária: <?php echo isset($estagio['carga_horaria']) ? $estagio['carga_horaria'] : 'N/A'; ?></li>
                    <li>Período do Início: <?php echo isset($estagio['periodo_estagio_inicio']) ? $estagio['periodo_estagio_inicio'] : 'N/A'; ?></li>
                    <li>Período do Fim: <?php echo isset($estagio['periodo_estagio_fim']) ? $estagio['periodo_estagio_fim'] : 'N/A'; ?></li>
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
