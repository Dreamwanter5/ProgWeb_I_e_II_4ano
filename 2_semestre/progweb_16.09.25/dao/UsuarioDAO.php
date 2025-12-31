<?php
require_once("baseDAO.php");
require_once ("../model/usuario.php");

class UsuarioDAO extends BaseDAO{
    public function inserir($usuario){
        $sql = "INSERT INTO usuarios (nome, email, data_nascimento, senha) values (:nome, :email, :data_nascimento, :senha)";
        $parametros = array(
            ":nome" => $usuario->nome,
            ":email" => $usuario->email,
            ":data_nascimento" => $usuario->data_nascimento,
            ":senha" => $usuario->senha
        );
        $this->executaComParametros($sql, $parametros);
    }

    public function existeEmail($usuario)
    {
        $sql = "SELECT id FROM usuarios WHERE email = :email";

        $parametros = array(
            ":email" => $usuario->getEmail()
        );

        $stmt = $this->executaComParametros($sql, $parametros);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($result) {
            return true;
        } else {
            return false;
        }
    }

    public function autenticar($email, $senha)
    {
        $sql = "SELECT id, nome, email, data_nascimento FROM  usuarios WHERE email = :email AND senha = :senha";

        $parametros = array(
            ":email" => $email,
            ":senha" => $senha
        );

        $stmt = $this->executaComParametros($sql, $parametros);
        $resultado = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($resultado) {
            $cadastrado = new Usuario(
                $resultado['nome'],
                $resultado['email'],
                $resultado['senha'],
                $resultado['data_nascimento']
            );
            return $cadastrado;
        } else {
            return null;
        }

        if ($autenticado == null) {
            $mensagem = array(
                "mensagem" => "Usuário/senha não encontrado."
            );
            echo json_encode($mensagem)
            http_response_code(400);
        }
    }
}

$controller = new UsuarioController();
if($_GET['acao'] == 'autenticar'){
    
}