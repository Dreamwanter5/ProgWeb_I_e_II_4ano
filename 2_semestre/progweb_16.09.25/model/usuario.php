<?php
class Usuario implements JsonSerializable{
    public $id;
    public $nome;
    public $email;
    public $data_nascimento;
    public $senha;
public function jsonSerialize()
    {
        return [
            'id' => $this->id,
            'nome' => $this->nome,
            'email' => $this->email,
            'data_nascimento' => $this->data_nascimento
        ];
    }

    function __construct(
        $nome,
        $email,
        $senha,
        $data_nascimento,
        $id = 0
    ) {
        $this->nome = $nome;
        $this->email = $email;
        $this->senha = $senha;
        $this->data_nascimento = $data_nascimento;
        $this->id = $id;
    }

    public function getNome()
    {
        return $this->nome;
    }

    public function setNome($nome)
    {
        $this->nome = $nome;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function setEmail($email)
    {
        $this->email = $email;
    }

    public function getSenha()
    {

        return $this->senha;
    }

    public function setSenha($senha)
    {
        $this->senha = $senha;
    }

    public function getDataNascimento()
    {
        return $this->data_nascimento;
    }

    public function setDataNascimento($data_nascimento)
    {
        $this->data_nascimento = $data_nascimento;
    }

    public function getId()
    {
        return $this->id;
    }
    public function setId($id)
    {
        $this->id = $id;
    }
    //Novas alterações a partir de 23.09.25
    // public function autenticar($usuario)
    // {
    //     $sql = "SELECT id, nome FROM usuarios WHERE email = :email AND senha = :senha";

    //     $parametros = array (
    //         ":email" => $usuario->email,
    //         ":senha" => $usuario->senha
    //     );

    //     $stmt = $this->executaComParametros($sql, $parametros);
    //     $result = $stmt->fetch(PDO::FETCH_ASSOC);

    //     if ($result){
    //         $autenticado = new Usuario();
    //         $autenticado->id = $result["id"];
    //         $autenticado->nome = $result["nome"];
    //         return $autenticado;
    //     } else {
    //         return null;
    //     }

    // }


}
