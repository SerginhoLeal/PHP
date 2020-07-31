<?php
class Usuario
{
    private $id;
    private $email;
    private $nome;
    private $senha;
    private $nivel;
    private $enviar;

    private $con;

    public function __construct($id = NULL, $email = NULL, $nome = NULL, $senha = NULL, $nivel = NULL, $enviar = NULL)
    {
        $this->id = $id;
        $this->email = $email;
        $this->nome = $nome;
        $this->senha = $senha;
        $this->nivel = $nivel;
        $this->enviar = $enviar;


        $this->con = new PDO(SERVIDOR, USUARIO, SENHA);
    }

    public function all(){

        $sql = $this->con->prepare("SELECT * FROM usuario");
        $sql->execute();
        $rows = $sql->fetchAll(PDO::FETCH_CLASS);

        if (!$rows) {
            $_SESSION['cor']='danger';
            $_SESSION['msg'] = "<b>Nenhum usuário cadastrado</b>";
        }

        return $rows;
    }

    public function create()
    {
        $sql = $this->con->prepare("INSERT INTO usuario (email, nome, senha, nivel, enviar) VALUES (?, ?, ?, ?, ?)");

        $sql->execute([$this->email, $this->nome, $this->senha, $this->nivel, $this->enviar]);

        if ($sql->errorCode() == '00000') {
            $_SESSION['cor'] = 'success';
            $_SESSION['msg'] = "Registro inserido";
        } else {
            $_SESSION['cor'] = 'danger';
            $_SESSION['msg'] = "<b>ERRO</b> " . $sql->errorInfo()[2];
        }

    }

    
    public function read(){

        $sql = $this->con->prepare("SELECT * FROM usuario WHERE id=?");
        $sql->execute([$this->id]);
        
        $row = $sql->fetchObject();
        if ($row) {
            $this->email = $row->email;
            $this->nome = $row->nome;
            $this->senha = $row->senha;
            $this->nivel = $row->nivel;
            $this->enviar = $row->enviar;
        }
        
    }

    public function update(){

        if ( !empty($this->senha)){
            $sql = $this->con->prepare("UPDATE usuario SET senha=? WHERE id=?");
            $sql->execute([$this->senha, $this->id]);
        }

        $sql = $this->con->prepare("UPDATE usuario SET email=?,nome=?, nivel=?, enviar=? WHERE id=?");
        $sql->execute([$this->email,$this->nome, $this->nivel, $this->enviar, $this->id]);

        if ($sql->errorCode() == '00000') {
            $_SESSION['cor'] = 'success';
            $_SESSION['msg'] = "Registro alterado";
            return 1;
        } else {
            $_SESSION['cor'] = 'danger';
            $_SESSION['msg'] = "<b>ERRO</b> " . $sql->errorInfo()[2];
            return 0;
        }

    }

    public function delete(){

        $sql = $this->con->prepare("DELETE FROM usuario WHERE id=?");
        $sql->execute([$this->id]);

        if ($sql->errorCode() == '00000') {
            $_SESSION['cor'] = 'success';
            $_SESSION['msg'] = "Registro excluido";
        } else {
            $_SESSION['cor'] = 'danger';
            $_SESSION['msg'] = "<b>ERRO</b> " . $sql->errorInfo()[2];
        }

    }

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    /*-----------------------------*/
    public function getEmail()
    {
        return $this->email;
    }

    public function setEmail($email)
    {
        $this->email = $email;
    }

    /*-----------------------------*/
    public function getNome()
    {
        return $this->nome;
    }

    public function setNome($nome)
    {
        $this->nome = $nome;
    }

    /*-----------------------------*/
    public function getSenha()
    {
        return $this->senha;
    }

    public function setSenha($senha)
    {
        $this->senha = $senha;
    }

    /*-----------------------------*/
    public function getNivel()
    {
        return $this->nivel;
    }

    public function setNivel($nivel)
    {
        $this->nivel = $nivel;
    }
    /*-----------------------------*/
    public function getEnviar()
    {
        return $this->enviar;
    }

    public function setEnviar($enviar)
    {
        $this->enviar = $enviar;
    }

    public function __toString()
    {
        return "USUÁRIO [ id: $this->id, email: $this->email,nome: $this->nome, senha: $this->senha, nível: $this->nivel, enviar: $this->enviar]<br>";
    }


}