<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Sistema de Estágio</title>
</head>
<body>
    <header>
        <div class="menu-header">
            <h1 class="logo">Sistema de Estágio</h1>
        </div>
    </header>
    <aside class="side-menu">
        <nav class="menu-nav">
            <ul>
                <li><a href="estudantes.php">Estudante</a></li>
                <li><a href="cidades.php">Cidades</a></li>
                <li><?php if ($_SESSION["usuario"]->getNivel() == 2) { ?><a href="usuarios.php">Usuários</a><?php } ?></li>
                <li><a href="professores.php">Professores</a></li>
                <li><a href="empresas.php">Empresas</a></li>
                <li><a href="estagios.php">Estágios</a></li>
                <li><a href="cursos.php">Cursos</a></li>
                <li><a href="representantes.php">Representantes</a></li>
            </ul>
        </nav>
    </aside>

    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const sideMenu = document.querySelector(".side-menu");
            const toggleMenu = document.createElement("button");
            toggleMenu.textContent = "☰";
            toggleMenu.classList.add("menu-toggle");
            toggleMenu.style.position = "fixed";
            toggleMenu.style.top = "10px";
            toggleMenu.style.left = "10px";
            toggleMenu.style.zIndex = "1100";
            toggleMenu.style.backgroundColor = "#004494";
            toggleMenu.style.color = "#fff";
            toggleMenu.style.border = "none";
            toggleMenu.style.borderRadius = "5px";
            toggleMenu.style.padding = "10px";

            document.body.appendChild(toggleMenu);

            toggleMenu.addEventListener("click", function () {
                sideMenu.classList.toggle("active");
            });
        });
    </script>
</body>
</html>
