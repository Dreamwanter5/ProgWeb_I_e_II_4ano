<?php
require("../model/usuario.php");
require_once("../dao/UsuarioDAO.php");

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
class UsuarioController
{
    private $dao;

    function __construct()
    {
        $this->dao = new UsuarioDAO();
    }

    function inserir()
    {
        $string_json = file_get_contents("php://input");
        $data = json_decode($string_json, true);

        if (!$data || !isset($data['nome'], $data['email'], $data['senha'], $data['data_nascimento'])) {
            http_response_code(400);
            echo json_encode(["mensagem" => "Dados inválidos ou incompletos"]);
            exit();
        }

        $usuario = new Usuario(
            $data['nome'],
            $data['email'],
            $data['senha'],
            $data['data_nascimento']
        );

        if ($this->dao->existeEmail($usuario)) {
            http_response_code(400);
            echo json_encode(["email" => "E-mail já cadastrado"]);
            exit();
        } else {

            $this->dao->inserir($usuario);
            echo json_encode(["mensagem" => "Usuário cadastrado com sucesso!"]);
            exit();
        }
    }
    function autenticar()
    {
        $json = file_get_contents("php://input");
        $data = json_decode($json, true);

        if (!$data || !isset($data['email'], $data['senha'])) {
            http_response_code(400);
            echo json_encode(["mensagem" => "Dados inválidos ou incompletos"]);
            exit();
        }

        $email = $data['email'];
        $senha = $data['senha'];


        $usuario = $this->dao->autenticar($email, $senha);

        if ($usuario != null) {
            session_start();
            $_SESSION['id'] = $usuario->getId();
            $_SESSION['nome'] = $usuario->getNome();

            $retorno = array(
                "mensagem" => "Usuário autenticado com sucesso"
            );
            echo json_encode($retorno);
        } else {
            $retorno = array(
                "mensagem" => "Usuário/senha inexistentes"
            );
            http_response_code(400);
            echo json_encode($retorno);
        }
        else {
            session_start();
            $_SESSION['id'] = $autenticado->id;
            $_SESSION['nome'] = $autenticado->nome;
        }
    }

}

$controller = new UsuarioController();
$acao = $_GET['acao'] ?? 'inserir';
if ($acao === 'autenticar') {
    $controller->autenticar();
} else {
    $controller->inserir();
}
