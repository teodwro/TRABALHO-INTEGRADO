<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de Estágio</title>
</head>
<body>

    <?php include("includes/menu.php"); ?>

    <h1>Sistema de Estágio - Cursos</h1>
    <a href="cursos.php">Voltar</a>

    <?php if (empty($professores)) {
        echo "<p>Adicione um Professor antes! </p>";
    } else { ?>

    <form action="salvarCurso.php" method="POST">
        <input type="hidden" name="id" value="<?php echo $curso->getId(); ?>">
        <input type="text" name="nome_curso" value="<?php echo $curso->getNomeCurso(); ?>" placeholder="Nome do Curso:" required>

        <select name="professor_curso" id="professor_curso">
           <?php foreach($professores as $professor){ ?>
                <option value="<?php echo $professor->getId() ?>"><?php echo $professor->getNomeProfessor() ?></option>    
            <?php } ?>
        </select> <br>
        <br>
        <button type="submit">Salvar</button>
    </form>
    
    <?php } ?>
</body>
</html>