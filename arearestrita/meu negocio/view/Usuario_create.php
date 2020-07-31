<?php require_once 'inc/header.php'; ?>

    <br>

    <div class="container">


        <div class="panel panel-default">

            <div class="panel-heading">Dados do usuário</div>

            <div class="panel-body">

                <form method="post" action="?classe=Usuario&acao=create&id=<?=$usuario->getId()?>">
                    
                    <div style="display: none" class="form-group">
                        <label for="email">Email:</label>
                        <input type="email" class="form-control" id="email" placeholder="Email"  name="email" value="<?=$usuario->getEmail()?>">
                    </div>

                    <div style="display: none" class="form-group">
                        <label for="senha">Senha:</label>
                        <input type="password" class="form-control" id="senha" placeholder="Senha" name="senha" value="">
                    </div>

                    <div style="display: none" class="form-group">
                        <label for="nivel">Nível de acesso:</label>
                        <input type="text" class="form-control" id="nivel" placeholder="Nível de acesso" name="nivel"  value="<?=$usuario->getNivel()?>">
                    </div>

                    <div class="form-group">
                        <label for="enviar">Seu Post</label>
                        <input type="text" class="form-control" id="enviar" placeholder="Deseja enviar uma mensagem?" name="enviar" value="<?=$usuario->getEnviar()?>">
                    </div>

                    <button type="submit" class="btn btn-primary">Salvar</button>
                    <a href="./?classe=Usuario&acao=all" class="btn btn-primary">Cancelar</a>

                </form>

            </div>

        </div>

    </div>

<?php require_once 'inc/footer.php'; ?>