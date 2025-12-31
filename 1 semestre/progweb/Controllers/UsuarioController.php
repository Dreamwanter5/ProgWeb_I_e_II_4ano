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

        $cadastrado = $this->dao->selecionarPorEmail($usuario);

        if ($cadastrado == null) {
            $this->dao->inserir($usuario);
            $resposta = [
                "mensagem" => "Usuário cadastrado com sucesso."
            ];
            echo json_encode($resposta);
        } else {
            $resposta = [
                "mensagem" => "Já existe um usuário com esse email."
            ];
            http_response_code(400);
            echo json_encode($resposta);
        }
    }

    function autenticar()
    {
        $json = file_get_contents("php://input");
        $data = json_decode($json, true);
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
    }

    function listar_todos()
    {
        session_start();

        if (isset($_SESSION['id']) && $_SESSION['isAdm']) {
            $usuarios = $this->dao->selecionarTodos();

            echo json_encode($usuarios);
        } else {
            $retorno = array(
                "mensagem" => "Você não permissão."
            );
            http_response_code(401);
            echo json_encode($retorno);
        }
    }
    function filtro_por_nome()
    {
        $nome = $_GET["filtro"];
        $usuarios = $this->dao->filtrarPorNome($nome);

        echo json_encode($usuarios);
    }
}
$acao = $_GET["acao"];
$controller = new UsuarioController();
if ($acao == "inserir") {
    $controller->inserir();
} else if ($acao == "listar_todos") {
    $controller->listar_todos();
} else if ($acao == 'filtrar') {
    $controller->filtro_por_nome();
} else if ($acao == "autenticar") {
    $controller->autenticar();
}
