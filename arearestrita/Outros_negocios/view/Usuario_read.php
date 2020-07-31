<?php require_once 'inc/header.php'; ?>

    <br>

    <div class="container">


        <div class="panel panel-default">

            <div class="panel-heading">Dados do usuário</div>

            <div class="panel-body">


                    <div class="form-group">
                        <label for="email">Email:</label>
                        <input type="email" class="form-control" id="email"
                               name="email" value="<?=$usuario->getEmail()?>" disabled>
                    </div>

                    <div class="form-group">
                        <label for="nivel">Nível de acesso:</label>
                        <input type="text" class="form-control" id="nivel"
                               name="nivel"  value="<?=$usuario->getNivel()?>" disabled>
                    </div>

                    <a href="./?classe=Usuario&acao=all" class="btn btn-primary">Voltar</a>

            </div>

        </div>

    </div>

<?php require_once 'inc/footer.php'; ?>