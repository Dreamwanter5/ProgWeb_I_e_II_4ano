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
}
