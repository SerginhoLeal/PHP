<?php
require_once "../inc/config.php";
if (!isset($_SESSION['usuario'])) {
    header("Location ./?modal=login");
    exit;
}

$usuario = $_SESSION['usuario'];

?>

<!-- sua página restrita entra aqui -->
<!-- <pre>
<?= json_encode($_SESSION, JSON_PRETTY_PRINT) ?>
</pre> -->

<?php
if (isset($_SESSION['msg'])) {
    echo $_SESSION['msg'];
    unset($_SESSION['msg']);
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <title>Sérgio-Leal</title>
  <link rel="shortcut icon" href="../nice.jpg"/>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="css/CSS Card Hover Effects  Html _ CSS.css">
</head>
<body style=" background: darkgray; margin-top:1%;">
  <div class="col-sm-3 sidenav text-center">
    <img style="width:50%;height:50%;border-radius:5%;" src="../nice.jpg" alt="">
    <h4>Bem Vindo <?=$usuario->nome?></h4>
    <ul id="menu" class="nav nav-pills nav-stacked">
      <li id="0"><a href="#section1">Meus Negócios</a></li>
      <li id="1"><a href="#section2">Outros Negócios</a></li>
      <li id="2"><a href="#section3">Family</a></li>
      <li id="3"><a href="#section3">Photos</a></li>
      <li id="4"><a href="#section3">Sobre o Criador</a></li>
      <li class="active"><a href="../?classe=Usuario&acao=logout">Sair <span class="glyphicon glyphicon-log-in"></span></a></li>
    </ul>
  </div>

  <div id="all">
    <!-- inicio da primeira pagina -->
      <div id="0" class="col-sm-9">
        <iframe style="width: 100%; height: 600px;" src="meu negocio/index.php" frameborder="0"></iframe>
      </div>
    <!-- final da primeira pagina -->
    <!-- inicio da segunda pagina -->
      <div id="1" class="col-sm-9">
      
        <iframe style="width: 100%; height: 600px;" src="outros_negocios/index.php" frameborder="0"></iframe>

      </div>
    <!-- final da segunda pagina -->
    <div id="2" class="col-sm-9">
      <h1>cccc</h1>
    </div>
    <div id="3" class="col-sm-9">
      <h1>dddd</h1>
    </div>
    <div id="4" class="col-sm-9">
      <iframe style="width: 100%; height: 400px;" src="CSS Card Hover Effects  Html _ CSS/index.html" frameborder="0"></iframe>
    </div>
  </div>
</body>
</html>




<script src="js/Alterar_pagina.js"></script>


<!-- sua página restrita entra aqui -->
