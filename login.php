<?php
require_once 'includes/db.php';
session_start();

$erro = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = trim($_POST['email']);
    $senha = $_POST['senha'];

    $stmt = $pdo->prepare("SELECT * FROM usuarios WHERE email = ?");
    $stmt->execute([$email]);
    $usuario = $stmt->fetch();

    if ($usuario && password_verify($senha, $usuario['senha'])) {
        $_SESSION['usuario_id'] = $usuario['id'];
        $_SESSION['usuario_nome'] = $usuario['nome'];
        header("Location: dashboard.php");
        exit;
    } else {
        $erro = "E-mail ou senha incorretos.";
    }
}
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Login - Taskify</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
    <header>
        <a href="index.php" class="logo">⚡ Taskify</a>
        <nav>
            <a href="register.php">Criar conta</a>
        </nav>
    </header>

    <div class="container">
        <div class="form-card animate-fade">
            <h2>Entrar no Taskify</h2>
            <?php if (isset($_GET['cadastrado'])): ?>
                <div style="background-color: #d1fae5; color: #065f46; padding: 10px; border-radius: 6px; margin-bottom: 20px; text-align: center;">Cadastro realizado com sucesso! Faça login.</div>
            <?php endif; ?>
            <?php if (!empty($erro)): ?>
                <div class="error-msg"><?= $erro ?></div>
            <?php endif; ?>
            <form action="login.php" method="POST">
                <div class="input-group">
                    <label>E-mail</label>
                    <input type="email" name="email" required>
                </div>
                <div class="input-group">
                    <label>Senha</label>
                    <input type="password" name="senha" required>
                </div>
                <button type="submit" class="btn" style="width: 100%;">Entrar</button>
            </form>
        </div>
    </div>

    <footer>
        <p>&copy; 2026 Taskify.</p>
    </footer>
</body>
</html>