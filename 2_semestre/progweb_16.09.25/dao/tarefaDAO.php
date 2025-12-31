<?php
require 'BaseDAO.php';
class TarefaDAO extends BaseDAO
{
    function inserir ($tarefa) {
        $sql = 'INSERT INTO tarefas (tipo_tarefa_id, nome, descricao, data_prevista_finalizacao, imagem_ajuda, usuario_id) VALUES (:tipo, :nome, :descricao, :dataPrevista, :imagem, :idUsuario);';
        $parametros = array (
            ":nome" => $tarefa->nome,
            ":tipo" => $tarefa->tipo_tarefa,
            ":descricao" => $tarefa->descricao,
            ":dataPrevista" => $tarefa->dataPrevista,
            ":imagem" => $tarefa->imagem,
            ":idUsuario" => $tarefa->idUsuario
        )

        $this->executaComParametros($sql, $parametros);
    }
    $function selecionarTodar($usuarioId){
        $sql = "SELECT t.id, t.nome"

    };

    $parametros = [
        ":usuario_id" => $usuarioId;
    ]
}
//