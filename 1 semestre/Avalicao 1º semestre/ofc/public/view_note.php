<?php
require_once __DIR__ . '/../config/config.php';
$id = $_GET['id'] ?? null;
if (!$id) header('Location: index.php');

$stmt = $pdo->prepare("SELECT * FROM notes WHERE id = ?");
$stmt->execute([$id]);
$note = $stmt->fetch();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $content = $_POST['content'];
    $stmt = $pdo->prepare("UPDATE notes SET content = ? WHERE id = ?");
    $stmt->execute([$content, $id]);
    header("Location: view_note.php?id=$id");
    exit;
}
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Editar Conteúdo</title>
    <link rel="stylesheet" href="../css/styles.css">
</head>
<body>
<header>
    <button class="btn" onclick="location.href='index.php'">← Voltar</button>
    <h1><?= htmlspecialchars($note['title']) ?></h1>
</header>
<div class="container">
    <form action="" method="post">
        <textarea name="content" rows="15" style="width:100%;"><?= htmlspecialchars($note['content']) ?></textarea><br><br>
        <button class="btn btn-edit" type="submit">Salvar</button>
    </form>
</div>
</body>
</html>