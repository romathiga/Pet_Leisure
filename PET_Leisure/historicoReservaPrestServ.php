<?php 
	session_start();
	//Conexão com banco de dados
	include_once("Config.php");
	$logado = $_SESSION['email'];
?>
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

                <li><a href="HomepagePrestServ.php">Home</a></li>
        
                <li><a href="perfilPrestServ.php">Meu Perfil</a></li>

                <li><a href="listarReservaPrestServ.php">Reservas</a></li>
        
                <li><a href="sairPrestServ.php">Sair</a></li>

                </li>
                </ul>
              </div><!-- /.navbar-collapse -->
            </div><!-- /.container-fluid -->
          </nav>

</div>
	<?php
	echo "<a class='p-3 mb-2 bg-primary text-white' href='HomepagePrestServ.php'>Voltar a página Inicial</a><br><br>";
	
	echo "<h1>Histórico de Reservas: </h1>";

    $sqlSelect = "SELECT id_prest_serv FROM usuario_prest_serv WHERE email = '$logado';";
    $resultadoPrestServ = $conexao->query($sqlSelect);
    $resultadoIdPrestServ = mysqli_fetch_assoc($resultadoPrestServ);
    $idPrestLogado = $resultadoIdPrestServ['id_prest_serv'];
	$result_horarios = "SELECT * FROM reserva WHERE  id_prest_serv = $idPrestLogado order by n_reserva DESC;";
	$resultado_horarios = mysqli_query($conexao, $result_horarios);
	
    

	while($row_horarios = mysqli_fetch_array($resultado_horarios)){
     
        ////-------
		$sqlSelectPrestServ = "SELECT nome, email, telefone FROM usuario_prest_serv WHERE id_prest_serv = $row_horarios[id_prest_serv];";
		$resultadoQueryPrestServ = $conexao->query($sqlSelectPrestServ);
		if($resultadoQueryPrestServ->num_rows>0){
			while($resultadoPrestServ = mysqli_fetch_assoc($resultadoQueryPrestServ)){
			$nomePrestServ= $resultadoPrestServ['nome'];
			$emailPrestServ= $resultadoPrestServ['email'];
			$TelefonePrestServ= $resultadoPrestServ['telefone'];
			/*echo "Nome Prestador de Serviço: ".$nomePrestServ."<br>";
			echo "E-mail Prestador de Serviço: ".$emailPrestServ."<br>";
			echo "Telefone p/Contato: ".$TelefonePrestServ."<br>";*/
			}
            }
               $sqlSelectDonoPet = "SELECT nome, email, telefone FROM usuario_dono_pet where id_dono_pet =  $row_horarios[id_dono_pet];";
        //echo $sqlSelectDonoPet;
        $resultadoQueryDonoPet = $conexao->query($sqlSelectDonoPet);
			if($resultadoQueryDonoPet->num_rows>0){
            while($resultadoDonoPet = mysqli_fetch_assoc($resultadoQueryDonoPet)){
                //$id_dono_pet= $resultadoDonoPet['id_dono_pet'];
                $nome_dono_pet= $resultadoDonoPet['nome'];
                $emailDonoPet = $resultadoDonoPet['email'];
                $telefoneDonoPet =$resultadoDonoPet['telefone'];
                echo "Nome Dono do Pet: ".$nome_dono_pet."<br>";
                echo "E-mail Dono do Pet: ".$emailDonoPet."<br>";
                echo "Telefone p/Contato: ".$telefoneDonoPet."<br>";
                echo "Tipo Animal: ".$row_horarios['tipo_animal']."<br>";
                echo "Observações: ".$row_horarios['observacoes']."<br>";
		        echo "Horário : ".date('d/m/Y H:i:s', strtotime($row_horarios['data']))."<hr>";
                }
            }
	
		
	}
	
            
	 ?>


<!-- RODAPE -->

<?php
 include('rodape.php');
 ?>
   