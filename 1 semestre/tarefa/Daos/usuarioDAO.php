<?php

require_once('BaseDAO.php');
require_once('../Entities/Usuario.php');

class UsuarioDAO extends BaseDAO
{
    public function inserir($usuario)
    {
        $sql = "INSERT INTO usuario (nome, email, senha, 
        data_nascimento)
            VALUES (:nome, :email, :senha, :data_nascimento)";
        $parametros = array(
            ":nome" => $usuario->getNome(),
            ":email" => $usuario->getEmail(),
            ":senha" => $usuario->getSenha(),
            ":data_nascimento" => $usuario->getDataNascimento(),
        );
        $this->executaComParametros($sql, $parametros);
    }

    public function selecionarPorEmail($usuario)
    {
        $sql = "SELECT id, nome, email, senha, data_nascimento FROM usuario WHERE email = :email";

        $parametros = array(
            ":email" => $usuario->getEmail()
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
    }

    public function selecionarTodos()
    {
        $sql = "SELECT id, nome, email, data_nascimento FROM usuario";

        $stmt = $this->executar($sql);
        $retorno = array();

        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $usuario = new Usuario(
                $row["nome"],
                $row["email"],
                ""
            );
            array_push($retorno, $usuario);
        }

        return $retorno;
    }

    public function filtro_por_nome($nome){
        $sql = "SELECT id, nome, email, FROM usuario WHERE nome LIKE :nome";

        $parametros = array(
            ":nome" => "%$nome%"
        );
        $stmt = $this->executaComParametros($sql, $parametros);
        $retorno = array();

        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $usuario = new Usuario(
                $row["nome"],
                $row["email"],
                ""
            );
            array_push($retorno, $usuario);
        }

        return $retorno;
    }

    public function autenticar($email, $senha)
    {
        $sql = "SELECT id, nome, email, senha FROM usuario WHERE email = :email AND senha = :senha";

        $parametros = array(
            ":email" => $email,
            ":senha" => $senha
        );
        $stmt = $this->executaComParametros($sql, $parametros);
        $resultado = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($resultado) {
            return new Usuario(
                $resultado['nome'],
                $resultado['email'],
                $resultado['senha']
            );
        } else {
            return null;
        }
    }
}
