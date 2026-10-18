<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= isset($pageTitle) ? $pageTitle . ' - Taskify' : 'Taskify - Automação e Gestão de Tarefas' ?></title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
    <header>
        <a href="index.php" class="logo">⚡ Taskify</a>
        <nav>
            <?php if (isset($_SESSION['usuario_id'])): ?>
                <a href="dashboard.php">Meu Painel</a>
                <span style="margin-left: 20px; color: #64748b;">Olá, <strong><?= htmlspecialchars($_SESSION['usuario_nome']) ?></strong></span>
                <a href="logout.php" style="color: #dc2626;">Sair</a>
            <?php else: ?>
                <a href="index.php">Início</a>
                <a href="login.php">Entrar</a>
                <a href="register.php" class="btn" style="padding: 8px 16px;">Cadastrar</a>
            <?php endif; ?>
        </nav>
    </header>
    <div class="container">