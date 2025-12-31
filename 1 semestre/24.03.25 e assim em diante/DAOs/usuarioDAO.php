<?php
require_once("BaseDAO.php");
// Extends BaseDAO to inherit the connection to the database
// and other common methods
// Serve trazer todas as funções comuns para os DAOs
// e não repetir o código em cada DAO
require_once("../Entities/usuario.php");
//Estamos no arquivo usuarioDAO.php, para que ele funcione, precisamos incluir o arquivo usuario.php
//que contém a classe Usuario, que representa a tabela usuario do banco de dados
//Dao precisa conversar com a entidade, então precisamos incluir a entidade

class UsuarioDAO extends BaseDAO{
   public function inserirUsuario($usuario) {
        $nome = $usuario->getNome();
        $email = $usuario->getEmail();
        $senha = $usuario->getSenha();
        $telefone = $usuario->getTelefone();
        $genero = $usuario->getGenero();
        $endereco = $usuario->getEndereco();
        $biografia = $usuario->getBiografia();
        
        $connection_string = "mysql:host=localhost;dbname=progweb;port=3306";
        $db_user = "root";
        $connection = new PDO($connection_string, $db_user);

        $sql = "INSERT INTO usuario (nome, email, senha, telefone, genero, endereco, bio) VALUES (:nome, :email, :senha, :telefone, :genero, :endereco, :bio)";
        $parametros = array(
            ":nome" => $usuario->getNome(),
            ":email" => $usuario->getEmail(),
            ":senha" => $usuario->getSenha(),
            ":telefone" => $usuario->getTelefone(),
            ":genero" => $usuario->getGenero(),
            ":endereco" => $usuario->getEndereco(),
            ":bio" => $usuario->getBiografia(),
        );
        $this->executaComParametros($sql, $parametros);
    }
}



?>