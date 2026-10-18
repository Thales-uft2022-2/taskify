<?php
require_once 'includes/db.php';
session_start();

$erro = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nome = trim($_POST['nome']);
    $email = trim($_POST['email']);
    $senha = password_hash($_POST['senha'], PASSWORD_DEFAULT);

    if (empty($nome) || empty($email) || empty($_POST['senha'])) {
        $erro = "Por favor, preencha todos os campos.";
    } else {
        try {
            $stmt = $pdo->prepare("INSERT INTO usuarios (nome, email, senha) VALUES (?, ?, ?)");
            $stmt->execute([$nome, $email, $senha]);
            header("Location: login.php?cadastrado=1");
            exit;
        } catch (\PDOException $e) {
            $erro = "Este e-mail já está cadastrado.";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Cadastro - Taskify</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
    <header>
        <a href="index.php" class="logo">⚡ Taskify</a>
        <nav>
            <a href="login.php">Já tem uma conta? Entrar</a>
        </nav>
    </header>

    <div class="container">
        <div class="form-card animate-fade">
            <h2>Criar Conta</h2>
            <?php if (!empty($erro)): ?>
                <div class="error-msg"><?= $erro ?></div>
            <?php endif; ?>
            <form action="register.php" method="POST">
                <div class="input-group">
                    <label>Nome Completo</label>
                    <input type="text" name="nome" required>
                </div>
                <div class="input-group">
                    <label>E-mail</label>
                    <input type="email" name="email" required>
                </div>
                <div class="input-group">
                    <label>Senha</label>
                    <input type="password" name="senha" required>
                </div>
                <button type="submit" class="btn" style="width: 100%;">Cadastrar</button>
            </form>
        </div>
    </div>

    <footer>
        <p>&copy; 2026 Taskify.</p>
    </footer>
</body>
</html>