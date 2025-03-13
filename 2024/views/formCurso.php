<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de Estágio - Adicionar Cursos</title>

    <?php include("includes/menu.php"); ?>

    <h1>Cursos</h1>
    <a href="cursos.php" aria-label="Voltar para a lista de cursos">Voltar</a>

    <?php if (empty($professores)) { ?>
        <p>Adicione um Professor antes!</p>
    <?php } else { ?>

    <form action="salvarCurso.php" method="POST" aria-labelledby="form-titulo">
        <input type="hidden" name="id" value="<?php echo $curso->getId(); ?>">
        <label for="nome_curso">Nome do Curso:</label>
        <input type="text" id="nome_curso" name="nome_curso" value="<?php echo $curso->getNomeCurso(); ?>" placeholder="Nome do Curso" required>
        
        <label for="professor_curso">Professor:</label>
        <select name="professor_curso" id="professor_curso" required>
           <?php foreach($professores as $professor){ ?>
                <option value="<?php echo $professor->getId(); ?>"><?php echo $professor->getNomeProfessor(); ?></option>    
            <?php } ?>
        </select>

        <button type="submit" aria-label="Salvar curso">Salvar</button>
    </form>

    <?php } ?>
</body>
</html>
