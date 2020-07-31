<?php

require_once "model/Usuario.php";

class UsuarioController
{

    public function login(){

        $obj = new Usuario();
        $obj->autentica($_POST['email'], $_POST['nome'], $_POST['senha']);

        if ( isset($_SESSION['usuario']) ){
            header("Location: ./arearestrita");
        }else{
            header("Location: ./?modal=login");
        }

    }

    public function cadastro(){

        $usuario = new Usuario();
        $usuario->registra($_POST['email'], $_POST['nome'], $_POST['senha'], $_POST['confirma']);

        header("Location: ./?modal=cadastro");

    }

    public function senha(){

        $obj = new Usuario();
        $obj->reseta($_POST['email']);

        header("Location: ./?modal=senha");

    }

    public function novaSenha(){

        $obj = new Usuario();
        $obj->alteraSenha($_POST['uid'], $_POST['senha'], $_POST['confirma'] );

        if ( isset($_SESSION['usuario']) ){
            header("Location: ./arearestrita");
        }else{
            header("Location: ./?uid=".$_POST['uid']);
        }

    }

    public function logout(){

        $obj = new Usuario();
        $obj->logout();

        header("Location: ./");

    }
}