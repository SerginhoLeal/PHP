<?php require_once 'inc/header.php'; ?>

    <br>

    <div class="container">


        <div class="panel panel-default">

            <div class="panel-heading">Dados do usuário</div>

            <div class="panel-body">

                <form method="post" action="?classe=Usuario&acao=create">

                    <div class="form-group">
                        <label for="email">Email:</label>
                        <input type="email" class="form-control" id="email"
                               placeholder="Email" name="email">
                    </div>

                    <div class="form-group">
                        <label for="senha">Senha:</label>
                        <input type="password" class="form-control" id="senha"
                               placeholder="Senha" name="senha">
                    </div>

                    <div class="form-group">
                        <label for="nivel">Nível de acesso:</label>
                        <input type="text" class="form-control" id="nivel"
                               placeholder="Nível de acesso" name="nivel">
                    </div>

                    <button type="submit" class="btn btn-primary">Salvar</button>
                    <a href="./?classe=Usuario&acao=all" class="btn btn-info">Ver empresarios</a>

                </form>

            </div>

        </div>

    </div>

<?php require_once 'inc/footer.php'; ?>