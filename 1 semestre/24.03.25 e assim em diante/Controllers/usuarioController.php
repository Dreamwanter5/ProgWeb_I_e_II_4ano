<?php
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);
require_once("../DAOs/UsuarioDAO.php");
require_once("../Entities/Usuario.php");

class UsuarioController
{
    private $dao;
    function __construct()
    {
        $this->dao = new UsuarioDAO();
    }

    function inserir()
    {
        $json = file_get_contents("php://input");
        $data = json_decode($json, true);
        $nome = $data["nome"];
        $email = $data["email"];
        $senha = $data["senha"];
        $data_nascimento = $data["data_nascimento"];

        $usuario = new Usuario(
            $nome,
            $email,
            $senha,
            $data_nascimento
        );
        $this->dao->inserir($usuario);
    }
}

$controller = new UsuarioController();
$controller->inserir();



?>