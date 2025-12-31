

   <?php
    $nome = $_POST["nome"];
    $email = $_POST["email"];
    $senha = $_POST["senha"];
    $telefone = $_POST["telefone"];
    $genero = $_POST["genero"];
    $endereco = $_POST["endereco"];
    $biografia = $_POST["biografia"];

    $connection_string = "mysql:host=localhost;dbname=progweb;port=3306";
    $db_user = "root";
    $connection = new PDO($connection_string, $db_user);

    $sql = "INSERT INTO usuario (nome, email, senha, telefone, genero, endereco, bio) VALUES (:nome, :email, :senha, :telefone, :genero, :endereco, :bio)";
    $parametros = array(
        ":nome" => $nome,
        ":email" => $email,
        ":senha" => $senha,
        ":telefone" => $telefone,
        ":genero" => $genero,
        ":endereco" => $endereco,
        ":bio" => $biografia
    );
    $stmt = $connection->prepare($sql);
    foreach($parametros as $chave => $valor){
        $stmt->bindValue($chave, $valor);
    }
    
    $stmt->execute($parametros);

   ?>
   <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title> 
    </head>
    <body>
    <?php
        $nome = $_POST["nome"];
        $email = $_POST["email"];
        $senha= $_POST["senha"];
        
        echo("Nome:".$nome."<br>Email:".$email."<br>Senha inserida:".$senha);
    ?>
    
    </body>
    </html>
