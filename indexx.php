<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página de Boas-Vindas</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
    <div class="welcome-container">
        <h1>Bem-vindo ao Nosso Site!</h1>
        <p>Estamos felizes em ter você aqui. Por favor, faça login para continuar.</p>
        <a href="login.php" class="login-link">Ir para Login</a>
        <a href="cadastro.html" class="login-link">Ir para cadastro</a>
    </div>
</body>
</html>

<?php
session_start();
if (!isset($_SESSION['nomeusuario'])) {
    header('Location: login.php'); // Redireciona para o login se o usuário não estiver autenticado
    exit;
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bem-vindo</title>
</head>
<body>
    <h1>Bem-vindo, <?php echo $_SESSION['nomeusuario']; ?>!</h1>
    <a href="logout.php">Sair</a>
</body>
</html>