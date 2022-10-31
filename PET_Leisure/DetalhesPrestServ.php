<?php


if(!empty($_GET['id'])){


    include_once('Config.php');

    $id =  $_GET['id'];

    $sqlSelect = "SELECT * FROM usuario_prest_serv WHERE id_prest_serv=$id;";

    $result = $conexao->query($sqlSelect);
    
    
   
    if($result->num_rows>0){

        while($user_data = mysqli_fetch_assoc($result)){
        $id_prest_serv = $user_data['id_prest_serv'];
        $email =  $user_data['email'];
        $password = $user_data['senha'];
        $docIdentidade = $user_data['docIdentidade'];
        $nome = $user_data['nome'];
        $telefone = $user_data['telefone'];
        $perfil = $user_data['perfil'];
        $hospedagem = $user_data['hospedagem'];
        $creche = $user_data['creche'];
        $qtdAnimaisAceitos = $user_data['qtdAnimaisAceitos'];
        $aceitaGato = $user_data['aceita_gato'];
        $aceitaCachorro = $user_data['aceita_cachorro'];
        $aceitaPassaro = $user_data['aceita_passaro'];
        $logradouro = $user_data['logradouro'];
        $cep = $user_data['CEP'];
        $numero = $user_data['numero'];
        $bairro = $user_data['bairro'];
        $pais = $user_data['pais'];
        $estado = $user_data['estado'];
        $cidade = $user_data['cidade'];
        $certificacao = $user_data['certificacao'];
        $precoReserva = $user_data['precoReserva'];
        $local = $user_data['imagem_local_1'];
        $local = $user_data['imagem_local_2'];
        $local = $user_data['imagem_local_3'];
        $obs = $user_data['obs'];
        }
    }
    else{
        header('location: HomepageUsuario.php');
    }
}


    $resultado = mysqli_fetch_assoc($result);
    

    $sql_IMG = "SELECT perfil from imagem_Prest where id_prestServ = $id_prest_serv;";   
    $consulta_IMG = $conexao->query($sql_IMG); 
    $resultado_IMG = mysqli_fetch_assoc($consulta_IMG);
     $imagem_Prestserv = $resultado_IMG['perfil'].".png";
    //echo $imagem_Prestserv;
    //$extensao == '.png';
    $img = "uploads/".$imagem_Prestserv;
    


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


        <title>Alteração de Informações</title>
        <style type="text/css">
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

        <div id="cadastro">

            <form action="InserirReserva.php" method="POST"  class="card1" >
            <br>

<div class="card-header">

                    <h2>Perfil Prestador de serviço. </h2>

                </div>
            
        <div class="row">
            <div class="col-8 col-md-3 "> <br> <!-- COLUNA 1 -->
                <?php
                     echo "<a href='".$img."'> <img src='".$img."'width='150' class='rounded-circle' height='150' > "."</a><br> ";
                ?>
                <br>
            </div>
            
            <div class="col-8 col-md-6 alert-primary" >  


                <div class="InputBox">
                    <div class="InputBox">
                        <br>
                        <label>E-Mail: </label><br>
                        <input type="email" name="email" required id="email" value="<?php echo $email?>" readonly>
                    </div>
                    
                    <div class="card-content-area">
                        <br><label>Nome: </label><br>
                        <input type="text" name="nome" required value="<?php echo $nome?>" readonly>
                    </div>


                    <!-- <div class="card-content-area">
                        <p>CPF/CNPJ Prestador de Serviço:</p>
                        <input type="text" name="docIdentidade"  
                        required pattern="(\d{3}\.?\d{3}\.?\d{3}-?\d{2}))" value="<?php echo $docIdentidade?>" readonly>

                    </div>
                    <br> -->

                    <div class="card-content-area">
                        <br><label>*Telefone para contato: </label><br>
                        <input type="text" name="tel"  
                        required pattern="(\d{2}\.?\d{1}\.?\d{4}-?\d{4})"value="<?php echo $telefone?>" readonly>
                    </div>

                    <!--<div class="card-content-area">
                        <label>*Nos envie imagem sua ou de sua logo para servir de perfil:</label>
                        <input type="file" name="perfil" required >
                    </div>
                    <br>-->

                    <div class="card-content-area">   
                        <br><label><b>*Esse perfil fornece:</b></label><br>
                        
                        Hospedagem/Diária?  <input type="text" name="hospedagem" required value="<?php echo $hospedagem?>" readonly>
                        <br><br> 
                        Creche/Semanal ou Mensal? <input type="text"  name="creche" required value="<?php echo $creche?>" readonly>
                        <br><br>
                   </div>

                    <div class="card-content-area">    
                        Preço do Serviço(R$): <input type="text" name="precoReserva"  
                         required value="<?php echo $precoReserva?>" readonly>
                        <br>
                    </div>
                    
                    <div class="card-content-area">
                        <br><label>*Quantos animais no total o local tem condições de acomodar por dia:</label><br>
                        <input type="number" max="10" min="1" name="qtdAnimais" required value="<?php echo $qtdAnimaisAceitos;?>" readonly>
                    </div>

                    <!--<div class="card-content-area">
                        <label>Se houver, nos envie certificações ou experiências relacionadas na area: </label>
                        <input type="file" name="certificacao" multiple>
                    </div>
                    <br> 

                    <div class="card-content-area">
                        <label>*Nos envie imagens do local onde será realizado os trabalhos:</label>
                        <input type="file" name="local" required multiple>
                    </div>-->
                     

                    <div class="card-content-area">
                        <br><label>*Animais aptos a usufruir desse local: </label></div>
                        <p>Cães:</p>
                        <input type="text" name="cachorro"  
                        required value="<?php echo $aceitaCachorro?>" readonly>
                        <hr>
                        <p>Gatos:</p>
                        <input type="text" name="gato"  
                        required value="<?php echo $aceitaGato?>" readonly>
                        </select>
                        <hr>
                        <p>Passáros:</p>
                        <input type="text" name="passaro"  
                        required value="<?php echo $aceitaPassaro?>" readonly>
                        <br>
                     


                    <div class="card-content-area">

                        <label>ENDEREÇO</label>
                        <p>Local Onde os pets irão se acomodar:
                        </p>

                        <b></b><label>*Rua: </label>
                        <input type="text" name="logradouro" required value="<?php echo $logradouro ?>" readonly>

                    </div>

                    <div class="card-content-area">

                        <label>*CEP:</label>
                        <input type="text" name="cep" required pattern="(\d{2}\.?\d{3}\.?\d{3})" value="<?php echo $cep ?>"readonly>

                    </div>

                    <div class="card-content-area">

                        <label>*Número:</label>
                        <input type="text" name="numero" minlength="1" maxlength="4" required value="<?php echo $numero ?>"readonly>

                    </div>

                    <div class="card-content-area">

                        <label>*Bairro:</label>
                        <input type="text" name="bairro" required value="<?php echo $bairro ?>"readonly>

                    </div>

                    <div class="card-content-area">

                        <label for="pais">*País:</label> </div>
                        <select name="pais"> 
                         <option value="br" readonly>Brasil</option>
                         </select>



                    <div class="card-content-area">

                        <label for="estado">*Estado:</label></div>
                        <select name="estado"> 
                        <option value="sp" readonly>São paulo</option> 
                        </select>



                    <div class="card-content-area">

                        <label for="cidade" readonly>*Cidade:</label></div>
                        <select name="cidade"> 
                        <option><?php echo $cidade?></option>
                        </select>



                    <div class="card-content-area">
                        <label>*Recado do Prestador de Serviços: </label><br>
                        <textarea name="obs"  required readonly><?php echo $obs?></textarea>
                    </div>


                </div>

            </div>
            
            <div class="col-8 col-md-3 alert-primary" style="border-left:3px; border-right: 0px; border-top: 0px; border-bottom: 0px; border-style: solid; border-color: black;"> 
                <br>
    

                <div class="alert-primary text-center">
                    <input type="hidden" name="id" value="<?php echo $id?>">
                     <?php echo "Efetuar Reserva:";echo " <a class='btn btn-info' href='InserirReserva.php?id=$id'>
                    <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-calendar-check' viewBox='0 0 16 16'>
                <path d='M10.854 7.146a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 1 1 .708-.708L7.5 9.793l2.646-2.647a.5.5 0 0 1 .708 0z'/>
                <path d='M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5zM1 4v10a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V4H1z'/>
                </svg></a>"."<br>";?>
                 <?php echo "Comentarios e avaliações:";echo " <a class='btn btn-info' href='Comentarios.php?id=$id'>
                    <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-calendar-check' viewBox='0 0 16 16'>
                <path d='M10.854 7.146a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 1 1 .708-.708L7.5 9.793l2.646-2.647a.5.5 0 0 1 .708 0z'/>
                <path d='M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5zM1 4v10a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V4H1z'/>
                </svg></a>"."<br>";?>
                    <!--<input type="submit" name="update" value="Efetuar Reserva" id="update" >-->
                </div>

            </form>

            </div>
        


        </div>
        <br><br>


<!-- RODAPE -->

<?php
 include('rodape.php');
?>
   