<!DOCTYPE html>

<html lang="pt-br">

    <head>

        <link rel="shortcut icon" href="../PET_Leisure/img/favicon.png" >
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <!-- Bootstrap -->
        <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <link href="css/rolagem.css" rel="stylesheet">
        <!-- <script type="text/javascript" src="/js/jquery.min.js"> </script>
             <script type="text/javascript" src="/js/bootstrap.min.js"> </script>-->

        <center> <img src="img/top.png" alt="Imagem do topo." ></center>


        <title>Alteração de Informações</title>
        <style>
            #update{
                background-image: linear-gradient(to right, rgb(0,92,197), rgb(90,20,220));
                width:50%;
                border: none;
                padding: 15px;
                color:white;
                font: size 15px;
                cursor: pointer;
                border-radius:10px;
            }
            #update:hover{
                background-image:linear-gradient(to right,rgb(0,80,172), rgb(80,19,195));
            }
        </style>
    </head>
    <body class="p-3 mb-2 bg-primary text-white"> 
    <div class="alert alert-primary" role="alert"> <!--cor azul claro-->

        <nav class="navbar navbar-default">
            <div class="container-fluid">
              <!-- Brand and toggle get grouped for better mobile display -->
              <div class="navbar-header">
              <nav type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <img src="./img/menu.png" width="20" height="20" alt=""></a>
              </nav>

                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">

                <li><a href="HomepageUsuario.php">Home</a></li>
        
                <li><a href="perfilDonoPet.php">Meu Perfil</a></li>

                <li><a href="listarReservaDonoPet.php">Reservas</a></li>
        
                <li><a href="sairDonoPet.php">Sair</a></li>

                </li>
                </ul>
              </div><!-- /.navbar-collapse -->
            </div><!-- /.container-fluid -->
          </nav>

</div>
                

                    </div>
                    


<?php 
	session_start();
	//Conexão com banco de dados
	include_once("Config.php");
	$logado = $_SESSION['email'];

    if(!empty($_GET['id'])){
    
        $id =  $_GET['id'];
    
        $sqlSelect = "SELECT nome, email FROM usuario_dono_pet WHERE email='$logado';";
    
        $result = $conexao->query($sqlSelect);
    
        if($result->num_rows>0){
            while($user_data = mysqli_fetch_assoc($result)){
            $nomeDonoPet= $user_data['nome'];
            $email =  $user_data['email'];
            //$mensagem = $user_data['mensagem'];
            }
        }
       /* else{
            header('location: HomepageUsuario.php');
        }*/
    }
    
?>
    <form class="form-horizontal" action="processaComentario.php" method="POST">
                <div class="form-group">
					<div class="col-sm-offset-2 col-sm-10">
						<input type="hidden" name="idPrestServ" value="<?php echo $id?>">
						<input type="hidden" name="nomeDonoPet" value="<?php echo $nomeDonoPet?>">
                        <input type="hidden" name="emailDonoPet" value="<?php echo $email?>">
                        <div class="card-content-area">
                        <label>*Fale um pouco sobre a sua experiência, críticas ou sugestões. </label>
                        <br>
                        <textarea name="comentario" maxlength="2000"  required></textarea><br><br>

						<button type="submit" class="btn btn-success">Cadastrar</button>
					</div>
				</div>
			
</form>

    
<!-- RODAPE -->

<?php
 include('rodape.php');
?>