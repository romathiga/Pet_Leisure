<?php


if(!empty($_GET['id'])){


    include_once('Config.php');

    $id =  $_GET['id'];

    $sqlSelect = "SELECT * FROM usuario_dono_pet WHERE id_dono_pet=$id;";

    $result = $conexao->query($sqlSelect);

    if($result->num_rows>0){
        while($user_data = mysqli_fetch_assoc($result)){
        $email =  $user_data['email'];
        $password = $user_data['senha'];
        $cpf = $user_data['cpf'];
        $nome = $user_data['nome'];
        $telefone = $user_data['telefone'];
        $tipoAnimal1 = $user_data['tipo_animal_1'];
        $tipoAnimal2 = $user_data['tipo_animal_2'];
        $tipoAnimal3 = $user_data['tipo_animal_3'];
        $idade_animal1 = $user_data['idade_animal_1'];
        $idade_animal2 = $user_data['idade_animal_2'];
        $idade_animal3 = $user_data['idade_animal_3'];
        $nome_animal1 = $user_data['nome_animal_1'];
        $nome_animal2 = $user_data['nome_animal_2'];
        $nome_animal3 = $user_data['nome_animal_3'];
        $foto_animal1 = $user_data['imagem_animal_1'];
        $foto_animal2 = $user_data['imagem_animal_2'];
        $foto_animal3 = $user_data['imagem_animal_3'];
        $rua = $user_data['logradouro'];
        $cep = $user_data['CEP'];
        $numero = $user_data['numero'];
        $bairro = $user_data['bairro'];
        $pais = $user_data['pais'];
        $estado = $user_data['estado'];
        $cidade = $user_data['cidade'];
        $obs = $user_data['obs'];
        }
    }
    else{
        header('location: perfilDonoPet.php');
    }


   


       
}

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


        <title>Cadastro de usuário dono de pet</title>
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
        
                <li><a href="sairDonoPet.php">Sair</a></li>

                </li>
                </ul>
              </div><!-- /.navbar-collapse -->
            </div><!-- /.container-fluid -->
          </nav>

</div>

        <div id="cadastro">

            <form action="saveEditDonoPet.php" method="POST"  class="card1" >

                <div class="card-header">

                    <h2>Cadastro de Usuário Dono de Pet </h2>

                </div>

                <div class="InputBox">

                    <div class="InputBox">

                        <label>DADOS DE LOGIN</label>
                        <label>*Email</label>
                        <input type="email" name="email" required id="email" value="<?php echo $email?>" readonly>

                    </div>


                    <div class="card-content-area">

                        <label for="password">*Senha</label>
                        <p>Crie uma senha com no mínimo 6 e no máximo 10 caracteres.</p>
                        <input type="password" name="password"  required minlength="6" maxlength="10" value="<?php echo $password?>" readonly>

                    </div>
                    

                    <div class="card-content-area">

                        <br><br><label>DADOS PESSOAIS</label>
                        <label>*Nome Completo</label>
                        <input type="text" name="nome" required value="<?php echo $nome?>">

                    </div>


                    <div class="card-content-area">

                        <label>*CPF</label>
                        <p>Digite seu CPF(Cadastro de Pessoa Física) sem pontos ou traços.</p>
                        <input type="text" name="cpf"  
                        required pattern="(\d{3}\.?\d{3}\.?\d{3}-?\d{2}))" value="<?php echo $cpf?>" readonly>

                    </div>
                    <br>

                    <div class="card-content-area">

                     <label>*Telefone para contato</label>
                        <p>Digite o número sem pontos ou traços e não se esqueça do DDD.</p>
                        <input type="text" name="tel"  
                        required pattern="(\d{2}\.?\d{1}\.?\d{4}-?\d{4})"value="<?php echo $telefone?>">

                    </div>
                    <br>


                    <div class="card-content-area">
                        <label>DADOS DOS PETS</label>
                        <label for="animal1">*Meu Animal 1 é:</label></div>
                        <select name="tipo_animal1"> 
                        <option value="cachorro">Cachorro</option> 
                        <option value="gato">Gato</option> 
                        <option value="passaro">Pássaro</option>
                        <option ><?php echo $tipoAnimal1?></option> 
                        </select>


                    <div class="card-content-area">

                        <label for="animal2">*Meu Animal 2 é:</label></div>
                        <select name="tipo_animal2"> 
                        <option value="nao_tem">Não tenho</option>
                        <option value="cachorro">Cachorro</option> 
                        <option value="gato">Gato</option> 
                        <option value="passaro">Pássaro</option>
                        <option ><?php echo $tipoAnimal2?></option> 
                        </select>

                    <div class="card-content-area">

                        <label for="animal3">*Meu Animal 3 é:</label></div>
                        <select name="tipo_animal3"> 
                        <option value="nao_tem">Não tenho</option>
                        <option value="cachorro">Cachorro</option> 
                        <option value="gato">Gato</option> 
                        <option value="passaro">Pássaro</option> 
                        <option ><?php echo $tipoAnimal3?></option>  
                        </select>

                        <br><br><br>


                    <div class="card-content-area">

                        <label>*Qual a idade do animal 1? (em anos)</label>
                        <input type="number" max="99" min="0" name="idade_animal_1" required>

                    </div>

                    <div class="card-content-area">

                             <label>Qual a idade do animal 2? (em anos)</label>
                             <input type="number" max="99" min="0" name="idade_animal2" >           

                    </div>

                    <div class="card-content-area">

                               <label>Qual a idade do animal 3? (em anos)</label>
                               <input type="number" max="99" min="0" name="idade_animal3">             

                     </div><br><br>

                     <div class="card-content-area">

                        <label>*Qual o nome do animal 1 ?</label>
                        <input type="text" name="nome_animal1" maxlength="20" required value="<?php echo $nome_animal1 ?>">

                    </div>
                    <div class="card-content-area">;

                        <label>Qual o nome do animal 2 ?</label>
                        <input type="text"  name="nome_animal2" maxlength="20" value="<?php echo $nome_animal2 ?>">           

                    </div>

                    <div class="card-content-area">

                        <label>Qual o nome do animal 3 ?</label>
                        <input type="text"  name="nome_animal3" maxlength="20" value="<?php echo $nome_animal3 ?>">             

                     </div> <br><br>

                    <div class="card-content-area">
                        <label>Nos envie fotos do animal 1: </label>
                        <p>Pressione (ctrl) no windowns e (Command)no mac para selecionar multiplos arquivos</p>
                        <input type="file" accept=".jpg, .jpeg, .png" name="foto_animal1" multiple required>
                    </div>
                    <br>  

                    <div class="card-content-area">
                        <label>Nos envie fotos do animal 2: </label>
                        <p>Pressione (ctrl) no windowns e (Command)no mac para selecionar multiplos arquivos</p>
                        <input type="file" accept=".jpg, .jpeg, .png" name="foto_animal2" multiple>
                    </div>
                    <br> 

                    <div class="card-content-area">

                        <label>Nos envie fotos do animal 3: </label>
                        <p>Pressione (ctrl) no windowns e (Command)no mac para selecionar multiplos arquivos</p>
                        <input type="file"  accept=".jpg, .jpeg, .png" name="foto_animal3" multiple>
                    </div>
                    <br>


                    <div class="card-content-area">

                        <br><br><br><label>ENDEREÇO</label>
                        <p>Fique tranquilo, pois seu endereço não ficará disponível para os prestadores de serviço.</p>

                        <b></b><label>*Rua: </label>
                        <input type="text" name="logradouro" required value="<?php echo $rua ?>">

                    </div>

                    <div class="card-content-area">

                        <label>*CEP:</label>
                        <input type="text" name="cep" required pattern="(\d{2}\.?\d{3}\.?\d{3})" value="<?php echo $cep ?>">

                    </div>

                    <div class="card-content-area">

                        <label>*Número:</label>
                        <input type="text" name="numero" minlength="1" maxlength="4" required value="<?php echo $numero ?>">

                    </div>

                    <div class="card-content-area">

                        <label>*Bairro:</label>
                        <input type="text" name="bairro" required value="<?php echo $bairro ?>">

                    </div>

                    <div class="card-content-area">

                        <label for="pais">*País:</label> </div>
                        <select name="pais"> 
                         <option value="br">Brasil</option>
                         </select>



                    <div class="card-content-area">

                        <label for="estado">*Estado:</label></div>
                        <select name="estado"> 
                        <option value="sp">São paulo</option> 
                        </select>



                    <div class="card-content-area">

                        <label for="cidade">*Cidade:</label></div>
                        <select name="cidade"> 
                        <option value="americana">Americana</option> 
                        <option value="amparo">Amparo</option> 
                        <option value="arturNogueira">Artur Nogueira</option> 
                        <option value="campinas">Campinas</option> 
                        <option value="cosmopolis">Cosmópolis</option> 
                        <option value="hortolandia">Hortolândia</option> 
                        <option value="indaiatuba">Indaiatuba</option> 
                        <option value="itatiba">Itatiba</option> 
                        <option value="itupeva">Itupeva</option> 
                        <option value="jaguariuna">Jaguariuna</option> 
                        <option value="jundiai">Jundiaí</option> 
                        <option value="louveira">Louveira</option> 
                        <option value="monteMor">Monte Mor </option> 
                        <option value="novaOdessa">Nova Odessa</option> 
                        <option value="paulinia">Paulínia</option> 
                        <option value="pedreira">Pedreira</option> 
                        <option value="santaBarbara">Santa Bárbara d'Oeste</option> 
                        <option value="sumare">Sumaré</option> 
                        <option value="valinhos">Valinhos</option> 
                        <option value="vinhedo">Vinhedo</option> 
                        <option ><?php echo $cidade?></option>
                        </select>



                    <div class="card-content-area">
                        <label>*Fale um pouco sobre o/os bichano/os, diga o que achar relevante, como alguma alergia, doença ou costumes: </label>
                        <textarea name="obs"  required><?php echo $obs?></textarea>
                    </div>



                </div>

                <div class="card-footer">
                    <input type="hidden" name="id" value="<?php echo $id?>">
                    <input type="submit" name="update" value="Salvar" id="update">
                </div>

            </form>




        </div>


<!-- RODAPE -->

<?php
 include('rodape.php');
 ?>
   