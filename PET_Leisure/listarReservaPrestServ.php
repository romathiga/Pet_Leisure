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

        <center> <img src="img/top.png" alt="Imagem do topo." width="100%"></center>


        <title>Reservas</title>
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
            a{
                color: #00008b;
            }
        </style>
    </head>
	<body class="p-3 mb-2 bg-primary text-white"> 
    <div class="alert alert-primary" role="alert"> <!--cor azul claro-->

        <nav class="navbar navbar-default">
            <div class="container-fluid">
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
              </div>
            </div>
          </nav>

</div>

    <div class="row">
        <div class="col-7 col-md-2  "> 
                
            <div class=" " style="border-radius: 10px;">
                <?php echo "<br><a class='btn alert-primary' href='HomepagePrestServ.php'>Voltar a página Inicial</a><br><br>";?>
            </div>
            <div>
               <?php echo " <a class='btn alert-primary' href='historicoReservaPrestServ.php' >"."Histórico de Reservas: "."
                <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-calendar-check' viewBox='0 0 16 16'>
                <path d='M10.854 7.146a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 1 1 .708-.708L7.5 9.793l2.646-2.647a.5.5 0 0 1 .708 0z'/>
                <path d='M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5zM1 4v10a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V4H1z'/>
                </svg></a>"."<br>";
                ?>
            </div>
        </div>


        <div class="col-5 col-md-5 alert-primary ">     
           
            <?php
                
                
                echo "<br><h1>Reservas agendadas para o dia de hoje:</h1><hr>";

                $sqlSelect = "SELECT id_prest_serv FROM usuario_prest_serv WHERE email = '$logado';";
                $resultadoPrestServ = $conexao->query($sqlSelect);
                $resultadoIdPrestServ = mysqli_fetch_assoc($resultadoPrestServ);
                $idPrestLogado = $resultadoIdPrestServ['id_prest_serv'];
                $result_horarios = "SELECT * FROM reserva WHERE DAY(data) = DAY(CURDATE()) AND MONTH(data) = MONTH(CURDATE()) AND YEAR(data) = YEAR(CURDATE()) and id_prest_serv = $idPrestLogado;";
                $resultado_horarios = mysqli_query($conexao, $result_horarios);
                
                

                while($row_horarios = mysqli_fetch_array($resultado_horarios)){
                    $idDonoPetReservado = $row_horarios['id_dono_pet'];
                    $n_reserva = $row_horarios['n_reserva'];
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
                        $sqlSelectDonoPet = "SELECT nome, email, telefone FROM usuario_dono_pet where id_dono_pet = $idDonoPetReservado ;";
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
                            echo "Horário: ".date('d/m/Y H:i:s', strtotime($row_horarios['data']))."<br>";
                            echo "Deletar Reserva: ";echo " <a class='btn btn-info' href='deletaReserva.php?id=$n_reserva'>
                            <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-calendar-check' viewBox='0 0 16 16'>
                            <path d='M10.854 7.146a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 1 1 .708-.708L7.5 9.793l2.646-2.647a.5.5 0 0 1 .708 0z'/>
                            <path d='M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5zM1 4v10a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V4H1z'/>
                            </svg></a>"."<hr>"."<br>";
                            }
                        }
                
                    
                }
                ?>
        </div>
        
        <div class="col-5 col-md-4 alert-primary" style="border-left: 3px solid #00008b;">   
             <?php
            echo "<br><h1>Reservas deste mês: </h1><br><hr>";
            
            $result_horarios = "SELECT * FROM reserva WHERE MONTH(data) = MONTH(CURDATE()) AND YEAR(data) = YEAR(CURDATE()) and id_prest_serv = $idPrestLogado;";
            $resultado_horarios = mysqli_query($conexao, $result_horarios);
            while($row_horarios = mysqli_fetch_array($resultado_horarios)){
                $sqlSelectPrestServ = "SELECT nome, email, telefone FROM usuario_prest_serv WHERE id_prest_serv = $row_horarios[id_prest_serv];";
                $idDonoPetReservado = $row_horarios['id_dono_pet'];
                $n_reserva = $row_horarios['n_reserva'];
                
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
                $sqlSelectDonoPet = "SELECT nome, email, telefone FROM usuario_dono_pet WHERE id_dono_pet = $idDonoPetReservado;";
                $resultadoQueryDonoPet = $conexao->query($sqlSelectDonoPet);
                if($resultadoQueryDonoPet->num_rows>0){
                    while($resultadoDonoPet = mysqli_fetch_assoc($resultadoQueryDonoPet)){
                        //$id_dono_pet= $resultadoDonoPet['id_dono_pet'];
                            $nome_dono_pet= $resultadoDonoPet['nome'];
                            $emailDonoPet = $resultadoDonoPet['email'];
                            $telefoneDonoPet = $resultadoDonoPet['telefone'];
                            echo "Nome Dono do Pet: ".$nome_dono_pet."<br>";
                            echo "E-mail Dono do Pet: ".$emailDonoPet."<br>";
                            echo "Telefone p/Contato: ".$telefoneDonoPet."<br>";
                            echo "Tipo Animal: ".$row_horarios['tipo_animal']."<br>";
                            echo "Observações: ".$row_horarios['observacoes']."<br>";
                            echo "Horário: ".date('d/m/Y H:i:s', strtotime($row_horarios['data']))."<br>";
                            echo "Deletar Reserva: ";echo " <a class='btn btn-info' href='deletaReserva.php?id=$n_reserva'>
                                <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-calendar-check' viewBox='0 0 16 16'>
                                <path d='M10.854 7.146a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 1 1 .708-.708L7.5 9.793l2.646-2.647a.5.5 0 0 1 .708 0z'/>
                                <path d='M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5zM1 4v10a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V4H1z'/>
                                </svg></a>"."<hr>"."<br>";
                        }
                    }
                    
            } ?>  
        </div>
        
    </div>
<br><br>
<!-- RODAPE -->

<?php
 include('rodape.php');
?>
