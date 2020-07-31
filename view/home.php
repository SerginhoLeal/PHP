<!DOCTYPE html>
<html lang="en">
<head>
    <title>Sérgio-Leal</title>
    <link rel="shortcut icon" href="nice.jpg"/>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</head>
<body>

<nav class="navbar navbar-expand-sm bg-dark navbar-dark">

    <a class="navbar-brand" href="#">Logo</a>

    <!-- Links -->
    <ul class="navbar-nav">

        <!-- início Botão Cadastro -->
        <li class="nav-item">
            <a class="nav-link" href="#" data-toggle="modal" data-target="#modal-cadastro">Cadastro</a>
        </li>
        <!-- fim Botão Cadastro -->

        <!-- inicio Modal Cadastro -->
        <div class="modal" id="modal-cadastro">
            <div class="modal-dialog">
                <div class="modal-content">

                    <!-- Cabeçalho -->
                    <div class="modal-header">
                        <h4 class="modal-title">Cadastro para acessar a área restrita</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>

                    <!-- Corpo -->
                    <div class="modal-body">

                        <div>
                            <?php
                            if (isset($_SESSION['msg'])) {
                                echo $_SESSION['msg'];
                                //  unset($_SESSION['msg']);
                            }
                            ?>
                        </div>

                        <form action="./?classe=Usuario&acao=cadastro" method="post">
                            <div class="form-group">
                                <label for="nome">Nome:</label>
                                <input type="nome" class="form-control" id="nome" placeholder="Digite o nome" name="nome" autofocus>
                            </div>
                            <div class="form-group">
                                <label for="email">Email:</label>
                                <input type="email" class="form-control" id="email" placeholder="Digite o email" name="email" autofocus>
                            </div>
                            <div class="form-group">
                                <label for="senha">Senha:</label>
                                <input type="password" class="form-control" id="senha" placeholder="Digite a senha" name="senha">
                            </div>
                            <div class="form-group">
                                <label for="confirma">Confirme a senha:</label>
                                <input type="password" class="form-control" id="senha" placeholder="Digite a confirmação da senha" name="confirma">
                            </div>

                            <p>Já é cadastrado?<a href="#" data-dismiss="modal" data-toggle="modal" data-target="#modal-login">Entrar</a></p>

                            <button type="submit" class="btn btn-primary">Cadastrar</button>

                        </form>

                    </div>

                    <!-- Rodapé -->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Fechar</button>
                    </div>

                </div>
            </div>
        </div>
        <!-- fim Modal Cadastro -->

        <!-- início Botão Login -->
        <li class="nav-item">
            <a class="nav-link" href="#" data-toggle="modal" data-target="#modal-login">Login</a>
        </li>
        <!-- fim Botão Login -->

        <!-- início Modal Login -->
        <div class="modal" id="modal-login">
            <div class="modal-dialog">
                <div class="modal-content">

                    <!-- Cabeçalho -->
                    <div class="modal-header">
                        <h4 class="modal-title">Entrar na área <b>restrita</b></h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>

                    <!-- Corpo -->
                    <div class="modal-body">

                        <div>
                            <?php
                            if (isset($_SESSION['msg'])) {
                                echo $_SESSION['msg'];
                                //     unset($_SESSION['msg']);
                            }
                            ?>
                        </div>

                        <form action="./?classe=Usuario&acao=login" method="post">
                            <div class="form-group">
                                <label for="email">Email:</label>
                                <input type="email" class="form-control" id="email" placeholder="Digite o email"
                                       name="email" autofocus>
                            </div>
                            <div class="form-group">
                                <label for="senha">Senha:</label>
                                <input type="password" class="form-control" id="senha" placeholder="Digite a senha"
                                       name="senha">
                            </div>

                            <p>Ainda não é cadastrado?<a href="#" data-dismiss="modal" data-toggle="modal"
                                                         data-target="#modal-cadastro">Cadastrar</a></p>

                            <p>Esqueceu a sua senha? <a href="#" data-dismiss="modal" data-toggle="modal"
                                                        data-target="#modal-senha">Criar nova senha</a></p>

                            <button type="submit" class="btn btn-primary">Entrar</button>

                        </form>

                    </div>

                    <!-- Rodapé -->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Fechar</button>
                    </div>


                </div>
            </div>
        </div>
        <!-- início Modal Login -->

        <!-- início Modal Senha -->
        <div class="modal" id="modal-senha">
            <div class="modal-dialog">
                <div class="modal-content">

                    <!-- Cabeçalho -->
                    <div class="modal-header">
                        <h4 class="modal-title">Criar sua <strong>nova senha</strong></h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>

                    <!-- Corpo -->
                    <div class="modal-body">

                        <div>
                            <?php
                            if (isset($_SESSION['msg'])) {
                                echo $_SESSION['msg'];
                                //        unset($_SESSION['msg']);
                            }
                            ?>
                        </div>

                        <form action="./?classe=Usuario&acao=senha" method="post">
                            <div class="form-group">
                                <label for="email">Email:</label>
                                <input type="email" class="form-control" id="email" placeholder="Digite o email"
                                       name="email" autofocus>
                            </div>

                            <p>Nós iremos enviar um email com instruções para você criar a sua nova senha.</p>

                            <button type="submit" class="btn btn-primary">Criar nova senha</button>

                        </form>

                    </div>

                    <!-- Rodapé -->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Fechar</button>
                    </div>

                </div>
            </div>
        </div>
        <!-- fim Modal Senha -->

        <!-- início Modal Nova Senha -->
        <div class="modal" id="modal-novasenha">
            <div class="modal-dialog">
                <div class="modal-content">

                    <!-- Cabeçalho -->
                    <div class="modal-header">
                        <h4 class="modal-title">Criar sua <strong>nova senha</strong></h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>

                    <!-- Corpo -->
                    <div class="modal-body">

                        <div>
                            <?php
                            if (isset($_SESSION['msg'])) {
                                echo $_SESSION['msg'];
                                //           unset($_SESSION['msg']);
                            }
                            ?>
                        </div>

                        <form action="./?classe=Usuario&acao=novaSenha" method="post">

                            <input type="hidden" class="form-control" id="uid"
                                   name="uid" value="<?= isset($_GET['uid'])?$_GET['uid']:''?>">

                            <div class="form-group">
                                <label for="senha">Senha:</label>
                                <input type="password" class="form-control" id="senha" placeholder="Digite a senha"
                                       name="senha"  autofocus>
                            </div>
                            <div class="form-group">
                                <label for="confirma">Confirme a senha:</label>
                                <input type="password" class="form-control" id="senha"
                                       placeholder="Digite a confirmação da senha"
                                       name="confirma">
                            </div>

                            <button type="submit" class="btn btn-primary">Criar nova senha</button>

                        </form>

                    </div>

                    <!-- Rodapé -->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Fechar</button>
                    </div>

                </div>
            </div>
        </div>
        <!-- fim Modal Nova Senha -->

    </ul>
    <!-- fim Links -->


</nav>

<div>
    <?php
    if (isset($_SESSION['msg'])) {
        echo $_SESSION['msg'];
        unset($_SESSION['msg']);
    }
    ?>
</div>

</body>
</html>

<script>
    var getUrlParameter = function getUrlParameter(sParam) {
        var sPageURL = window.location.search.substring(1),
            sURLVariables = sPageURL.split('&'),
            sParameterName,
            i;

        for (i = 0; i < sURLVariables.length; i++) {
            sParameterName = sURLVariables[i].split('=');

            if (sParameterName[0] === sParam) {
                return sParameterName[1] === undefined ? true : decodeURIComponent(sParameterName[1]);
            }
        }
    };

    var uid = getUrlParameter('uid');
    if (typeof uid !== 'undefined') {
        $("#modal-novasenha").modal();
    }

    //var modal = getUrlParameter('modal');
    //if (typeof modal !== 'undefined') {
    //    $("#modal-"+modal).modal();
    //}

</script>