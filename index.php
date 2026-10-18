<?php
session_start();
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Taskify - Automação e Gestão de Tarefas</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
    <header>
        <a href="index.php" class="logo">⚡ Taskify</a>
        <nav>
            <?php if (isset($_SESSION['usuario_id'])): ?>
                <a href="dashboard.php">Meu Painel</a>
                <a href="logout.php" style="color: #dc2626;">Sair</a>
            <?php else: ?>
                <a href="login.php">Entrar</a>
                <a href="register.php" class="btn" style="padding: 8px 16px;">Cadastrar</a>
            <?php endif; ?>
        </nav>
    </header>

    <div class="container">
        <section class="hero animate-fade">
            <h1>Automatize suas tarefas com inteligência</h1>
            <p>Gerencie suas rotinas, otimize seu tempo e deixe o trabalho pesado com o Taskify.</p>
            <?php if (!isset($_SESSION['usuario_id'])): ?>
                <a href="register.php" class="btn">Começar Gratuitamente</a>
            <?php else: ?>
                <a href="dashboard.php" class="btn">Acessar Painel</a>
            <?php endif; ?>
        </section>
    </div>

    <footer>
        <p>&copy; 2026 Taskify. Todos os direitos reservados.</p>
    </footer>
</body>
</html>