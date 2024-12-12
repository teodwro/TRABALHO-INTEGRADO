<form method="POST" action="">
    <h2>Filtrar Estágios</h2>
    
    <label for="curso_estagio">Curso:</label>
        <select name="filtro_curso" id="filtro_curso" required>
            <?php foreach ($cursos as $curso) { ?>
                <option value="<?php echo $curso->getId(); ?>"><?php echo $curso->getNomeCurso(); ?></option>    
            <?php } ?>
        </select>

    
    <label for="filtro_data_inicio">Data Início:</label>
    <input type="date" name="filtro_data_inicio" id="filtro_data_inicio">

    <label for="filtro_data_fim">Data Fim:</label>
    <input type="date" name="filtro_data_fim" id="filtro_data_fim">
    
    <label for="filtro_estudante">Nome Estudante:</label>
    <input type="text" name="filtro_estudante" id="filtro_estudante" placeholder="Digite o nome do estudante">
    
    <label for="filtro_empresa">Nome Empresa:</label>
    <select name="filtro_empresa" id="filtro_empresa" required>
            <?php foreach ($empresas as $empresa) { ?>
                <option value="<?php echo $empresa->getId(); ?>"><?php echo $empresa->getNomeEmpresa(); ?></option>    
            <?php } ?>
    </select>
    
    <label for="filtro_professor">Nome Professor Orientador:</label>
    <select name="filtro_professor" id="filtro_professor" required>
            <?php foreach ($professores as $professor) { ?>
                <option value="<?php echo $professor->getId(); ?>"><?php echo $professor->getNomeProfessor(); ?></option>    
            <?php } ?>
    </select>
    
    <label for="filtro_cidade">Cidade:</label>
    <select name="filtro_cidade" id="filtro_cidade" required>
            <?php foreach ($cidades as $cidades) { ?>
                <option value="<?php echo $cidades->getId(); ?>"><?php echo $cidades->getNome(); ?></option>    
            <?php } ?>
    </select>

    
    <button type="submit">Filtrar</button>
</form>
