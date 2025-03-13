<?php include("includes/menu.php"); ?>

<form method="POST" action="filtrarEstagio.php">
    <h1>Filtrar Estágios</h1>
    

    <a href="estagios.php">Cancelar filtragem</a>

    <label for="curso_estagio">Curso:</label>
        <select name="filtro_curso" id="filtro_curso" required>
            <option value="0" disabled selected>Selecione uma opção</option>
            <?php foreach ($cursos as $curso) { ?>
                <option value="<?php echo $curso->getId(); ?>"><?php echo $curso->getNomeCurso(); ?></option>    
            <?php } ?>
        </select>
    <label for="filtro_estudante">Nome Estudante:</label>
    <input type="text" name="filtro_estudante" id="filtro_estudante" placeholder="Digite o nome do estudante">

    <label for="filtro_data">Data do Estágio:</label>
    <input type="date" name="filtro_data" id="filtro_data">
    
    <label for="filtro_empresa">Nome Empresa:</label>
    <select name="filtro_empresa" id="filtro_empresa" required>
        <option value="0" disabled selected>Selecione uma opção</option>
            <?php foreach ($empresas as $empresa) { ?>
                <option value="<?php echo $empresa->getId(); ?>"><?php echo $empresa->getNomeEmpresa(); ?></option>    
            <?php } ?>
    </select>
    
    <label for="filtro_professor">Nome Professor Orientador:</label>
    <select name="filtro_professor" id="filtro_professor" required>
        <option value="0" disabled selected>Selecione uma opção</option>
        <?php foreach ($professores as $professor) { ?>
            <option value="<?php echo $professor->getId(); ?>"><?php echo $professor->getNomeProfessor(); ?></option>    
        <?php } ?>
    </select>
    
    <label for="filtro_cidade">Cidade:</label>
    <select name="filtro_cidade" id="filtro_cidade" required>
        <option value="0" disabled selected>Selecione uma opção</option>
        <?php foreach ($cidades as $cidades) { ?>
            <option value="<?php echo $cidades->getId(); ?>"><?php echo $cidades->getNome(); ?></option>    
        <?php } ?>
    </select>

    
    <button type="submit">Filtrar</button>
</form>
