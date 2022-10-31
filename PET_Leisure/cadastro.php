<!DOCTYPE html>


<html lang="pt-br">
 


<head >
  <link rel="shortcut icon" href="../PET_Leisure/img/favicon.png" >
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <!-- Bootstrap -->
  <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
  <link href="css/rolagem.css" rel="stylesheet">
   <!-- <script type="text/javascript" src="/js/jquery.min.js"> </script>
    <script type="text/javascript" src="/js/bootstrap.min.js"> </script>-->


  <center> <img src="img/top.png" alt="Imagem do topo." width="100%" ></center>


    <title>Pet Leisure - cadastro</title>

  </head>
 
 
 
 
  <body class="p-3 mb-2 bg-primary text-white">

  <div class="alert alert-primary" role="alert"> <!--cor azul claro-->
    <nav class="navbar navbar-default">
      <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
        <nav type="button" class="navbar-toggle collapsed " data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <img src="./img/menu.png" width="20" height="20" alt=""></a>
        </nav>
          
          <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
          <ul class="nav navbar-nav navbar-right">
         
            <li><a href="index.php">Home</a></li>
            <li><a href="loginUsuario.php">Dono de Pet</a></li>
            <li><a href="loginPrestServ.php">Prestador de serviços</a></li>
            <li><a href="cadastro.php">Novo por aqui?</a></li>
            <li><a href="info.php">Sobre Nós!</a></li>
            
          </li>
          </ul>
        </div><!-- /.navbar-collapse -->
      </div><!-- /.container-fluid -->
    </nav>

</div>

      <img src="./img/cadast.png" alt="Imagem realize seu cadastro.">

      <div class="card-deck mb-3 " style="width: 83%;  margin-left: auto; margin-right: auto;" id="cadastro">

        <form action="cadastroPrest.php" class="card">

            <div class="card-body bg-info mb-0" >
                <h2>Cadastro como Prestador de Serviços</h2>
            </div>

            <div class="card-content bg-info clearfix mb-0">
                <div class="card-content-area  bg-info mb-3"  style="margin-left: 15px;">
                    <label for="prest"><b><u>O que seria?</b></u> </label>
                      <p>O cadastro como prestador de serviço serve para você que gosta de animais de estimação, dispõe de tempo para bricar com eles e deseja prestar serviços como: cuidar de "pets", sejam eles cachorros, gatos ou até mesmo pássaros domésticos.</p>
                </div>

                <div class="card-content-area  bg-info mb-0 " style="margin-left: 15px;">
                    <label for="prest"><b><u>Porque prestar serviços?</u></b></label>
                      <p>Além de obter uma renda e ganhar vários pets amigos, você também ajuda muito os habitantes, sejam eles de sua comunidade ou de comunidades próximas a você.</p>
                </div>
            </div>

            <div class="card-footer bg-info mb-0">
                <input type="submit" class="btn btn-primary"  value="Cadastrar" class="submit">
            </div>
        </form>

        
        <form action="cadastroDonoPet.php" class="card">

          <div class="card-body bg-info mb-0" >
            <h2>Cadastro como Dono de Pet's</h2>
          </div>

          <div class="card-content bg-info clearfix mb-0">
            <div class="card-content-area  bg-info mb-3"  style="margin-left: 15px;">
              <label for="prest"><b><u>O que seria?</b></u> </label>
                <p>O cadastro como dono de Pet serve para você que precisa trabalhar ou realizar afazeres fora de casa e não quer deixar seu bichano sozinho sem supervisão. O cadastro irá permitir que você tenha acesso aos cuidadores de pet cadastrados, possibilitando encontrar o mais próximo de sua residência e aquele que mais se encaixa em teu bolso.</p>
            </div>

            <div class="card-content-area  bg-info mb-0 " style="margin-left: 15px;">
              <label for="prest"><b><u>Porque me cadastrar?</u></b></label>
                <p>Além de deixar seu animal seguro, você incentivará o trabalho dos prestadores de serviços na plataforma.</p>
            </div>
          </div>

          <div class="card-footer bg-info mb-0">
            <input type="submit" class="btn btn-primary"  value="Cadastrar" class="submit">
          </div>
        </form>

      </div>


<!-- RODAPE -->

<?php
 include('rodape.php');
 ?>
   