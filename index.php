<?php
session_start();
if (!isset($_SESSION['nomeusuario'])) {
    // Usuário não autenticado, exibe a página de boas-vindas original
?>
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
            <a href="cadastro.html" class="login-link">Ir para Cadastro</a>
        </div>
    </body>
    </html>
<?php
} else {
    // Usuário autenticado, exibe mensagem personalizada
?>
    <!DOCTYPE html>
    <html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Bem-vindo</title>
        <link rel="stylesheet" href="assets/css/style.css">
    </head>
    <body>
        <div class="welcome-container">
            <h1>Bem-vindo, <?php echo htmlspecialchars($_SESSION['nomeusuario']); ?>!</h1>
            <p>Você está autenticado com sucesso.</p>
            <a href="indexx.php" class="login-link">Sair</a>
        </div>
    </body>
    </html>
<?php
}





// essa pagina é o sucesso login!!!!!!!
?>


