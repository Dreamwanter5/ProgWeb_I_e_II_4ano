<?php
session_start();
if (!isset($_SESSION["id"])) {
    header('Location: /progweb');
    die();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listagem</title>
    <link rel="stylesheet" href="css/css.css">
    <script src="https://unpkg.com/petite-vue" defer></script>
    <script src="js/listagem_usuario.js" defer></script>
</head>

<body>
    <div class="container" v-scope="App" @vue:mounted="carregarUsuarios">
        <div>
            <label for="nome">Nome:</label>
            <input type="text" id="nome" name="nome" v-model="filtro">
            <button @click="filtrarUsuarios">Filtrar</button>
        </div>
        <table>
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>Email</th>
                    <th>Data Nascimento</th>
                    <th>Ação</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="usuario in usuarios" :key="usuario.id">
                    <td>{{usuario.nome}}</td>
                    <td>{{usuario.email}}</td>
                    <td>{{usuario.data_nascimento}}</td>
                    <td><button @click="removerUsuarios(usuario.id)">remover</button></td>
                </tr>
            </tbody>
        </table>
        <div>
            <a href="cadastro_usuario.html"><button>
                    Cadastrar Novo usuário
                </button></a>
        </div>
    </div>
</body>

</html>