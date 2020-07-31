<?php
class Usuario
{
    private $id;
    private $email;
    private $nome;
    private $senha;
    private $nivel;

    private $con;

    public function __construct($id = NULL, $email = NULL, $nome = NULL, $senha = NULL, $nivel = NULL)
    {
        $this->id = $id;
        $this->email = $email;
        $this->nome = $nome;
        $this->senha = $senha;

        $this->con = new PDO(SERVIDOR, USUARIO, SENHA);
    }

    public function autentica($email, $nome, $senha)
    {

        unset($_SESSION['usuario']);

        $sql = $this->con->prepare("SELECT * FROM usuario WHERE email=?");
        $sql->execute([$email]);
        $row = $sql->fetchObject();

        if ($row) {
            if (SHA1($senha) == $row->senha) {
                $_SESSION['usuario'] = $row;
                return 1;
            } else {
                $_SESSION['msg'] = "<div class='alert alert-danger'><b>Acesso negado</b> Senha inválida</div>";
                return 0;
            }
        } else {
            $_SESSION['msg'] = "<div class='alert alert-danger'><b>Acesso negado</b> Usuário não encontrado</div>";
            return 0;
        }

    }

    public function registra($email, $nome, $senha, $confirma)
    {

        unset($_SESSION['usuario']);

        $sql = $this->con->prepare("SELECT * FROM usuario WHERE email=?");
        $sql->execute([$email]);
        $row = $sql->fetchObject();

        if ($row) {
            $_SESSION['msg'] = "<div class='alert alert-danger'><b>Erro:</b> Email já cadastrado, tente outro</div>";
        } else {
            if (strlen($senha) < 6) {
                $_SESSION['msg'] = "<div class='alert alert-danger'><b>Erro:</b> Senha inválida, deve ter pelo menos 6 caracteres</div>";
            } else if ($senha != $confirma) {
                $_SESSION['msg'] = "<div class='alert alert-danger'><b>Erro:</b> Senha e confirmação devem ser iguais</div>";
            } else {
                $sql = $this->con->prepare("INSERT INTO usuario (email, nome, senha, nivel) VALUES(?, ?, ?, 'visitante')");
                $sql->execute([$email, $nome, SHA1($senha)]);

                $erro = $sql->errorInfo()[2];

                $sql = $this->con->prepare("SELECT * FROM usuario WHERE email=?");
                $sql->execute([$email]);
                $row = $sql->fetchObject();

                if ($row) {
                    $_SESSION['usuario'] = $row;
                    header("Location:  ../");
                } else {
                    $_SESSION['msg'] = "<div class='alert alert-danger'><b>Acesso negado</b> Email não encontrado: [$email][$erro] </div>";
                }

            }
        }

    }

    public function reseta($email)
    {

        $to = "$email";
        $uid = SHA1($email);

        $subject = "Criar nova senha";

        $message = "
        <html>
        <head>
        <title>Criar nova senha</title>
        </head>
        <body>
        <p>Clique no link abaixo para criar uma nova senha</p>
        <p>http://plixsite.net/curso/php/acessorestrito?uid=$uid</p>
        </body>
        </html>
        ";

        // Sempre cofigure o content-type quando for enviar email HTML
        $headers = "MIME-Version: 1.0" . "\r\n";
        $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
        $headers .= 'From: <webmaster@plixsite.net>' . "\r\n";

        if ( mail($to, $subject, $message, $headers) ){
            $_SESSION['msg'] = "<div class='alert alert-success'>Um email com as instruções de como criar a nova senha foi enviado para: [$email]</div>";
        }else{
            $_SESSION['msg'] = "<div class='alert alert-danger'>Ocorreu um erro no envio do email, tente novamente.</div>";
        }

    }

    public function alteraSenha($uid, $senha, $confirma)
    {

        unset($_SESSION['usuario']);

        if (strlen($senha) < 6) {
            $_SESSION['msg'] = "<div class='alert alert-danger'><b>Erro:</b> Senha inválida, deve ter pelo menos 6 caracteres</div>";
            return 0;
        } else if ($senha != $confirma) {
            $_SESSION['msg'] = "<div class='alert alert-danger'><b>Erro:</b> Senha e confirmação devem ser iguais</div>";
            return 0;
        }else{

            $sql = $this->con->prepare("UPDATE usuario SET senha=? WHERE SHA1(email)=?");
            $sql->execute([SHA1($senha),$uid]);

            if( $sql->errorCode()=='00000'){
                $sql = $this->con->prepare("SELECT * FROM usuario WHERE   SHA1(email)=?");
                $sql->execute([$uid]);
                $row = $sql->fetchObject();
                if ($row) {
                    $_SESSION['msg'] = "<div class='alert alert-danger'><b>Senha</b> alterada com sucesso!</div>";
                    $_SESSION['usuario'] = $row;
                    return 1;
                } else {
                    $_SESSION['msg'] = "<div class='alert alert-danger'><b>Acesso negado</b> Usuário não encotrado!</div>";
                    return 0;
                }

            }else{
                $_SESSION['msg'] = "<div class='alert alert-danger'><b>Acesso negado</b> ".$sql->errorInfo()[2]."</div>";
                return 0;
            }

        }

    }

    public function logout()
    {
        $_SESSION['msg'] = "<div class='alert alert-danger'><b>Sessão encerrada</b></div>";
        unset($_SESSION['usuario']);
    }

    /*-----------------------------*/
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

}