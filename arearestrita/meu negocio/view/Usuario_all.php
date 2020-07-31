<?php require_once 'inc/header.php';
$usuario = $_SESSION['usuario'];
?>

<div class="container">

    <div class="row">

        <h2>Minhas postagens</h2>

        <div class="panel panel-default">

            <br>

            <div class="panel-body">

                <table id="tabela" class="table table-striped table-bordered" style="width:100%">

                    <thead>
                    <tr>
                        <td width="100px"><?=$usuario->nome?></td>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                        echo "<tr>    
                        <td>
                            <a class='btn btn-primary' href='?classe=Usuario&acao=update&id=$usuario->id'>Alterar</a>
                        </td>
                        </tr>";
                        // <a class='btn btn-primary' href='?classe=Usuario&acao=delete&id=$usuario->id'>Excluir</a>
                        ?>
                    </tbody>

                </table>

            </div>

        </div>

    </div>

</div>

<?php require_once 'inc/footer.php'; ?>
