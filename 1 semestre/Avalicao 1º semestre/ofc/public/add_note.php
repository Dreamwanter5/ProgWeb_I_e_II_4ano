<?php
require_once __DIR__ . '/../config/config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = $_POST['title'];
    $categories = $_POST['categories'];
    $stmt = $pdo->prepare("INSERT INTO notes (title, categories) VALUES (?, ?)");
    $stmt->execute([$title, $categories]);
    header('Location: index.php');
    exit;
}
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Adicionar Nota</title>
    <link rel="stylesheet" href="../css/styles.css">
</head>
<body>
<header>
    <button class="btn" onclick="location.href='index.php'">← Voltar</button>
    <h1>Adicionar Nota</h1>
</header>
<div class="container">
    <form action="" method="post">
        <label>Título da nota:</label><br>
        <input type="text" name="title" required><br><br>
        <label>Categorias:</label><br>
        <input type="text" name="categories"><br><br>
        <button class="btn btn-add" type="submit">Salvar</button>
    </form>
</div>
</body>
</html>