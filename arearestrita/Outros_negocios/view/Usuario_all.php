<?php require_once 'inc/header.php'; ?>

<div class="container">

    <div class="row">

        <h2>Empresarios procurando ajuda</h2>

        <div class="panel panel-default">

            <div class="panel-heading">
                <!-- <div class="pull-right"><a class="btn btn-primary" href='?classe=Usuario&acao=create'>Novo</a></div> -->
                <a href="./?classe=Usuario&acao=all" class="btn btn-info">Atualizar página</a>
            </div> 
            <br>

            <div class="panel-body">

                <table id="tabela" class="table table-striped table-bordered" style="width:100%">

                    <thead>
                    <tr>
                        <th width="100px">Nome</th>
                        <th width="1000px">Post</th>
                    </tr>
                    </thead>

                    <tbody>
                    <?php foreach($usuarios as $usuario){
                        echo "<tr>
                            <td>$usuario->nome</td>
                            <td>$usuario->enviar</td>     
                            </tr>";
                            // <td>
                            // <a class='btn btn-primary' href='?classe=Usuario&acao=update&id=$usuario->id'>Alterar</a>
                            // <a class='btn btn-primary' href='?classe=Usuario&acao=delete&id=$usuario->id'>Excluir</a>
                            // </td> 
                        } ?>
                    </tbody>

                </table>

            </div>

        </div>

    </div>

</div>

<?php require_once 'inc/footer.php'; ?>
