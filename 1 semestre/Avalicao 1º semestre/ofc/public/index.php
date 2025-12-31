<?php
require_once __DIR__ . '/../config/config.php';

// Buscar todas as notas
$stmt = $pdo->query("SELECT id, title, categories FROM notes ORDER BY created_at DESC");
$notes = $stmt->fetchAll();
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Minhas Anotações</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
<header>
    <img src="../images/profile.gif" alt="Perfil">
    <h1>Meus Cartões</h1>
</header>
<div class="container">
    <button class="btn btn-add" onclick="location.href='add_note.php'">Adicionar Cartão</button>
    <?php if ($notes): ?>
        <?php foreach ($notes as $note): ?>
            <div class="card" onclick="location.href='view_note.php?id=<?= $note['id'] ?>'">
                <div class="card-title"><?= htmlspecialchars($note['title']) ?></div>
                <div class="card-categories"><?= htmlspecialchars($note['categories']) ?></div>
                <button class="btn btn-edit" onclick="event.stopPropagation(); location.href='edit_note.php?id=<?= $note['id'] ?>';">Editar</button>
                <button class="btn btn-delete" onclick="event.stopPropagation(); deleteNote(<?= $note['id'] ?>);">Deletar</button>
            </div>
        <?php endforeach; ?>
    <?php else: ?>
        <p>Não há notas cadastradas.</p>
    <?php endif; ?>
</div>
<script src="../js/script.js"></script>

</body>
</html>