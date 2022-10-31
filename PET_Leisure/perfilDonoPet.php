<?php
 
 session_start();
 include_once('Config.php');

//print_r($_SESSION);

if((!isset($_SESSION['email']) == true) and (!isset($_SESSION['senha']) == true))
{
    unset($_SESSION['email']);
    unset($_SESSION['senha']);
    header('Location: loginUsuario.php');
}
$logado = $_SESSION['email'];
  $sql = "SELECT * FROM usuario_dono_pet WHERE email = '$logado' ORDER BY id_dono_pet DESC;";

 
$result = $conexao->query($sql);


//listar foto de perfil do dono de pet

$SqlIdDonoPet = "SELECT id_dono_pet from usuario_dono_pet where email = '$logado';";
$sqlDonoPet = $conexao->query($SqlIdDonoPet);
$resultado = mysqli_fetch_assoc($sqlDonoPet);
$idDonoPet = $resultado['id_dono_pet'];



  $sql_IMG = "SELECT imagem_perfil from imagem_Pet where id_donoPet = $idDonoPet;";   
  $consulta_IMG = $conexao->query($sql_IMG); 
  $resultado_IMG = mysqli_fetch_assoc($consulta_IMG);
  $imagem_DonoPet = $resultado_IMG['imagem_perfil'].".png";
  //echo $imagem_DonoPet;
 
//$extensao == '.png';

$img = "upload/".$imagem_DonoPet;
//echo "<a href='".$img."'> <img src='".$img."'width='150'> "."</a><br>";
//echo $img;




?>
<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Pet Leisure - home</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
    <link href="css/rolagem.css" rel="stylesheet">
   <!-- <script type="text/javascript" src="/js/jquery.min.js"> </script>
    <script type="text/javascript" src="/js/bootstrap.min.js"> </script>-->
    <center> <img src="img/top.png" alt="Imagem do topo." ></center>
    <style>
        .table-bg{
            background: rgba(0,0,0,0.3);
            border-radius: 15px 15px 0 0;
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


<!-- Imagem de perfil -->
<?php
echo "<a href='".$img."'> <img src='".$img."'width='150px'class='rounded-circle' height='125' > "."</a><br>"; 
?>



 
        <div id="cadastro">

            <form action="CadastroDonoPet.php" method="POST"  class="card1" >

                <div class="card-header">

                    <h2>Meu Perfil</h2>
                </div>
                <?php
                    while($user_data = mysqli_fetch_assoc($result)){
                      echo "Editar Perfil: ".
                      "<a class='btn btn-primary' href='editDonoPet.php?id=$user_data[id_dono_pet]'>
                              <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-pencil-square' viewBox='0 0 16 16'>
                              <path d='M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z'/>
                              <path fill-rule='evenodd' d='M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z'/>
                              </svg>
                      </a>"."<br>";
                        echo "<tr>";
                        echo"ID: ".$user_data['id_dono_pet']."<br>";
                        echo"CPF: ".$user_data['cpf']."<br>";
                        echo"E-Mail: ".$user_data['email']."<br>";
                        echo"Nome: ".$user_data['nome']."<br>";
                        echo"Telefone: ".$user_data['telefone']."<br>";
                        echo"Tipo Animal 1: ".$user_data['tipo_animal_1']."<br>";
                        echo"Tipo Animal 2: ".$user_data['tipo_animal_2']."<br>";
                        echo"Tipo Animal 3: ".$user_data['tipo_animal_3']."<br>";
                        echo"Nome Animal 1: ".$user_data['nome_animal_1']."<br>";
                        echo"Nome Animal 2:".$user_data['nome_animal_2']."<br>";
                        echo"Nome Animal 3:".$user_data['nome_animal_3']."<br>";
                        echo"Idade Animal 1: ".$user_data['idade_animal_1']."<br>";
                        echo"Idade Animal 2: ".$user_data['idade_animal_2']."<br>";
                        echo"Idade Animal 3: ".$user_data['idade_animal_3']."<br>";
                        echo"Rua: ".$user_data['logradouro']."<br>";
                        echo"Cep: ".$user_data['CEP']."<br>";
                        echo"Número: ".$user_data['numero']."<br>";
                        echo"Bairro: ".$user_data['bairro']."<br>";
                        echo"País: ".$user_data['pais']."<br>";
                        echo"Estado: ".$user_data['estado']."<br>";
                        echo"Cidade: ".$user_data['cidade']."<br>";
                        echo"Observações: ".$user_data['obs']."<br>";

                        

                    }
                ?>

          
        </div>
        </div>

<!-- RODAPE -->

<?php
 include('rodape.php');
?>