<?php
require_once 'includes/db.php';

// Busca todas as tarefas pendentes
$stmt = $pdo->prepare("SELECT * FROM tarefas WHERE status = 'pendente'");
$stmt->execute();
$tarefasPendentes = $stmt->fetchAll();

foreach ($tarefasPendentes as $tarefa) {
    $tipo = $tarefa['tipo'];
    $sucesso = false;

    // O sistema identifica qual automação executar com base no 'tipo'
    switch ($tipo) {
        case 'enviar_email':
            // Aqui entra o código PHP para disparar e-mails automáticos
            // mail(...);
            $sucesso = true;
            break;

        case 'limpar_logs':
            // Aqui entra o código PHP para apagar arquivos temporários da pasta do XAMPP
            // array_map('unlink', glob("C:/xampp/htdocs/taskify/logs/*"));
            $sucesso = true;
            break;

        default:
            // Apenas uma tarefa comum ou genérica
            $sucesso = true;
            break;
    }

    // Se a automação rodar com sucesso, atualiza para concluído
    if ($sucesso) {
        $update = $pdo->prepare("UPDATE tarefas SET status = 'concluido' WHERE id = ?");
        $update->execute([$tarefa['id']]);
    }
}