<?php
require_once __DIR__ . '/../config/config.php';
$id = $_GET['id'] ?? null;
if (!$id) header('Location: index.php');

// Buscar dados
$stmt = $pdo->prepare("SELECT * FROM notes WHERE id = ?");
$stmt->execute([$id]);
$note = $stmt->fetch();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = $_POST['title'];
    $categories = $_POST['categories'];
    $stmt = $pdo->prepare("UPDATE notes SET title = ?, categories = ? WHERE id = ?");
    $stmt->execute([$title, $categories, $id]);
    header('Location: index.php');
    exit;
}
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Editar Nota</title>
    <link rel="stylesheet" href="../css/styles.css">
</head>
<body>
<header>
    <button class="btn" onclick="location.href='index.php'">← Voltar</button>
    <h1>Editar Nota</h1>
</header>
<div class="container">
    <form action="" method="post">
        <label>Título da nota:</label><br>
        <input type="text" name="title" value="<?= htmlspecialchars($note['title']) ?>" required><br><br>
        <label>Categorias:</label><br>
        <input type="text" name="categories" value="<?= htmlspecialchars($note['categories']) ?>"><br><br>
        <button class="btn btn-edit" type="submit">Atualizar</button>
    </form>
</div>
</body>
</html>