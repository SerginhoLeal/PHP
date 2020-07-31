<?php
require_once 'model/Usuario.php';

class UsuarioController
{

    public function all(){

        $obj = new Usuario();
        $usuarios = $obj->all();
        require_once 'view/Usuario_all.php';

    }

    public function create(){

        $usuario = new Usuario();

        if( isset( $_POST['email']) ){
            $usuario->setEmail($_POST['email']);
            $usuario->setNome($_POST['nome']);
            $usuario->setSenha($_POST['senha']);
            $usuario->setNivel($_POST['nivel']);
            $usuario->setEnviar($_POST['enviar']);
            $usuario->create();

            header("Location: ./?classe=Usuario&acao=all");
        }

        require_once 'view/Usuario_create.php';

    }

    public function read(){

        $usuario = new Usuario($_GET['id']);
        $usuario->read();
        require_once 'view/Usuario_read.php';

    }

    public function update(){

        $usuario = new Usuario($_GET['id']);
        $usuario->read();

        if( isset( $_POST['email']) ){
            $usuario->setEmail($_POST['email']);
            $usuario->setSenha($_POST['senha']);
            $usuario->setNivel($_POST['nivel']);
            $usuario->setEnviar($_POST['enviar']);


            if ( $usuario->update() ){
               header("Location: ./?classe=Usuario&acao=all");
            }

        }

        require_once 'view/Usuario_update.php';

    }

    public function delete(){

        $obj = new Usuario($_GET['id']);
        $obj->delete();
        header("Location: ./?classe=Usuario&acao=all");

    }

    public function cadastro(){

        $obj = new Usuario($_GET['id']);
        $obj->delete();
        header("Location: ./?classe=Usuario&acao=all");

    }

}

