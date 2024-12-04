<ul>
    <li>
        <a href="index.php">Estudantes</a>
    </li>
    <li>
        <a href="cidades.php">Cidades</a>
    </li>
    <?php if($_SESSION["usuario"]->getNivel() == 2) { ?>
    <li>
        <a href="usuarios.php">Usuários</a>
    </li>
    <?php } ?>
    
    <li>
        <a href="empresas.php">Empresas</a>
    </li>

    <li>
        <a href="representantes.php">Representantes</a>
    </li>
    <li>
        <a href="professores.php">Professores</a>
    </li>
    <li>
        <a href="cursos.php">Cursos</a>
    </li>
    <li>
        <a href="logout.php">Sair</a>
    </li>
    
</ul>