    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <button id="button"></button>
        <div class="menu-header">
            <h1 class="logo">Sistema de Estágio</h1>
        </div>
        <a href="logout.php" class="logout">Sair</a>
    </header>
    <aside class="side-menu">
        <nav class="menu-nav">
            <ul>
                <li><a href="estudantes.php">Estudante</a></li>
                <li><a href="cidades.php">Cidades</a></li>
                <?php if ($_SESSION["usuario"]->getNivel() == 2) { ?><li><a href="usuarios.php">Usuários</a></li><?php } ?>
                <li><a href="professores.php">Professores</a></li>
                <li><a href="empresas.php">Empresas</a></li>
                <li><a href="estagios.php">Estágios</a></li>
                <li><a href="cursos.php">Cursos</a></li>
                <li><a href="representantes.php">Representantes</a></li>
                
            </ul>
            <ul>
                <li class="logout"></li>
            </ul>
        </nav>
    </aside>

    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const sideMenu = document.querySelector(".side-menu");
            const toggleMenu = document.getElementById("button");
            toggleMenu.textContent = "☰";
            toggleMenu.classList.add("menu-toggle");
            toggleMenu.style.top = "10px";
            toggleMenu.style.left = "10px";
            toggleMenu.style.zIndex = "1100";
            toggleMenu.style.backgroundColor = "#004494";
            toggleMenu.style.color = "#fff";
            toggleMenu.style.border = "none";
            toggleMenu.style.borderRadius = "5px";
            toggleMenu.style.padding = "10px";

            toggleMenu.addEventListener("click", function () {
                sideMenu.classList.toggle("active");
            });
        });
    </script>
