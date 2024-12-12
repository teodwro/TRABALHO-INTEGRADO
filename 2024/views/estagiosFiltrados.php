<?php if (isset($resultados) && count($resultados) > 0): ?>
    <h2>Estágios Filtrados</h2>
    <table>
        <thead>
            <tr>
                <th>Nome Estudante</th>
                <th>Nome Empresa</th>
                <th>Curso</th>
                <th>Data Início</th>
                <th>Data Fim</th>
                <th>Nome Professor Orientador</th>
                <th>Cidade</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($resultados as $estagio): ?>
                <tr>
                    <td><?= $estagio['nome_estudante'] ?></td>
                    <td><?= $estagio['nome_empresa'] ?></td>
                    <td><?= $estagio['curso_id'] ?></td>
                    <td><?= $estagio['data_inicio'] ?></td>
                    <td><?= $estagio['data_fim'] ?></td>
                    <td><?= $estagio['nome_professor_orientador'] ?></td>
                    <td><?= $estagio['cidade'] ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
<?php else: ?>
    <p>Nenhum estágio encontrado com os critérios selecionados.</p>
<?php endif; ?>
