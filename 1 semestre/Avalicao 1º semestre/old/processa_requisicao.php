<?php 
    try {
    $nome = $_POST["nome"];
    $email = $_POST["email"];
    $senha = $_POST["senha"];
    $data_nascimento = $_POST["data_nascimento"];
    $telefone = $_POST["telefone"];
    $genero = $_POST["genero"];
    $endereco = $_POST["endereco"];
    $bio = $_POST["bio"];

    $connection_string = 
    "mysql:host=localhost;dbname=progweb;port=3306";
    $db_user = "root";
    $connecion = new PDO($connection_string, $db_user);
    $connecion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sql = "INSERT INTO usuario (nome, email, senha, 
        data_nascimento, telefone, genero, endereco, biografia)
            VALUES (:nome, :email, :senha, :data_nascimento, :telefone,
            :genero, :endereco, :biografia)";
    $parametros = array(
        ":nome" => $nome,
        ":email"=> $email,
        ":senha"=> $senha,
        ":data_nascimento"=> $data_nascimento,
        ":telefone"=> $telefone,
        ":genero"=> $genero,
        ":endereco"=> $endereco,
        ":biografia"=> $bio
    );
    $stmt = $connecion->prepare($sql);
    foreach ($parametros as $chave => $valor) {
        $stmt->bindValue($chave, $valor);
    }
    $stmt->execute();
}
catch(Exception $e){
    echo($e->getMessage());
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
</body>
</html>