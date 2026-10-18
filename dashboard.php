<?php
$pageTitle = "Painel";
require_once 'includes/header.php';
require_once 'includes/db.php';

$usuario_id = $_SESSION['usuario_id'];
$mensagem = '';

// Processar cadastro de nova tarefa
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['acao']) && $_POST['acao'] == 'nova_tarefa') {
    $titulo = trim($_POST['titulo']);
    $descricao = trim($_POST['descricao']);

    if (!empty($titulo)) {
        $stmt = $pdo->prepare("INSERT INTO tarefas (usuario_id, titulo, descricao) VALUES (?, ?, ?)");
        $stmt->execute([$usuario_id, $titulo, $descricao]);
        $mensagem = "Tarefa criada com sucesso!";
    }
}

// Buscar tarefas do usuário
$stmt = $pdo->prepare("SELECT * FROM tarefas WHERE usuario_id = ? ORDER BY criado_em DESC");
$stmt->execute([$usuario_id]);
$tarefas = $stmt->fetchAll();
?>

<div class="animate-fade">
    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 30px;">
        <h2>Suas Tarefas e Automações</h2>
        <button onclick="document.getElementById('modal-tarefa').style.display='block'" class="btn">+ Nova Tarefa</button>
    </div>

    <?php if (!empty($mensagem)): ?>
        <div style="background-color: #d1fae5; color: #065f46; padding: 12px; border-radius: 6px; margin-bottom: 20px; text-align: center;"><?= $mensagem ?></div>
    <?php endif; ?>

    <!-- Lista de Tarefas -->
    <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); gap: 20px;">
        <?php if (count($tarefas) > 0): ?>
            <?php foreach ($tarefas as $tarefa): ?>
                <div style="background: white; padding: 20px; border-radius: 10px; box-shadow: 0 4px 6px rgba(0,0,0,0.05); border-left: 5px solid var(--primary-color);">
                    <h3 style="margin-bottom: 10px;"><?= htmlspecialchars($tarefa['titulo']) ?></h3>
                    <p style="color: #64748b; font-size: 0.95rem; margin-bottom: 15px;"><?= htmlspecialchars($tarefa['descricao']) ?></p>
                    <div style="display: flex; justify-content: space-between; align-items: center; font-size: 0.85rem;">
                        <span style="background: #e2e8f0; padding: 4px 8px; border-radius: 4px; text-transform: uppercase; font-weight: bold;"><?= $tarefa['status'] ?></span>
                        <span style="color: #94a3b8;"><?= date('d/m/Y H:i', strtotime($tarefa['criado_em'])) ?></span>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <p style="color: #64748b; grid-column: 1 / -1; text-align: center; padding: 40px; background: white; border-radius: 10px;">Nenhuma tarefa cadastrada ainda. Clique em "+ Nova Tarefa" para começar!</p>
        <?php endif; ?>
    </div>
</div>

<!-- Modal Simples para Nova Tarefa -->
<div id="modal-tarefa" style="display:none; position: fixed; top: 0; left: 0; width: 100%; height: 100%; background: rgba(0,0,0,0.5); z-index: 1000;">
    <div style="background: white; max-width: 500px; margin: 80px auto; padding: 30px; border-radius: 12px; box-shadow: 0 10px 25px rgba(0,0,0,0.1);">
        <h3 style="margin-bottom: 20px;">Adicionar Nova Tarefa</h3>
        <form action="dashboard.php" method="POST">
            <input type="hidden" name="acao" value="nova_tarefa">
            <div class="input-group">
                <label>Título da Tarefa</label>
                <input type="text" name="titulo" required placeholder="Ex: Backup automático do sistema">
            </div>
            <div class="input-group">
                <label>Descrição / Detalhes</label>
                <textarea name="descricao" rows="4" style="width: 100%; padding: 12px; border: 1px solid var(--gray-border); border-radius: 6px; outline: none;" placeholder="Descreva o que essa tarefa faz..."></textarea>
            </div>
            <div style="display: flex; justify-content: flex-end; gap: 10px; margin-top: 20px;">
                <button type="button" onclick="document.getElementById('modal-tarefa').style.display='none'" class="btn" style="background-color: #64748b;">Cancelar</button>
                <button type="submit" class="btn">Salvar Tarefa</button>
            </div>
        </form>
    </div>
</div>

<?php
require_once 'includes/footer.php';
?>