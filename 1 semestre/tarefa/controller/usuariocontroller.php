<?php
require_once __DIR__ . '/../Daos/usuarioDAO.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome = $_POST['nome'] ?? '';
    $email = $_POST['email'] ?? '';
    $senha = $_POST['senha'] ?? '';

    if ($nome && $email && $senha) {
        $usuario = new Usuario($nome, $email, $senha);
        $dao = new UsuarioDAO();
        if ($dao->inserir($usuario)) {
            echo "Usuário cadastrado com sucesso!";
        } else {
            echo "Erro ao cadastrar usuário.";
        }
    } else {
        echo "Preencha todos os campos!";
    }
}
?>