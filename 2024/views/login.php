<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de Estágio - Login</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <div class="container">
        <h1>Sistema de Estágio - Login</h1>
        <form action="fazerLogin.php" method="post">
            <label for="login">Login:</label>
            <input type="text" name="login" id="login" placeholder="Digite seu login" required>
            
            <label for="senha">Senha:</label>
            <input type="password" name="senha" id="senha" placeholder="Digite sua senha" required>
            
            <button type="submit" class="btn">Entrar</button>
        </form>
    </div>

</body>
</html>
