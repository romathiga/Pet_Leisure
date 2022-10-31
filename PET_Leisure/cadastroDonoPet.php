<?php


if(isset($_POST['submit'])){


    include_once('Config.php');

    $email =  $_POST['email'];
    $password = password_hash($_POST['password'],PASSWORD_DEFAULT);
    $cpf = $_POST['cpf'];
    $nome = $_POST['nome'];
    $telefone = $_POST['tel'];
    $tipoAnimal1 = $_POST['tipo_animal1'];
    $tipoAnimal2 = $_POST['tipo_animal2'];
    $tipoAnimal3 = $_POST['tipo_animal3'];
    $idade_animal1 = $_POST['idade_animal1'];
    $idade_animal2 = $_POST['idade_animal2'];
    $idade_animal3 = $_POST['idade_animal3'];
    $nome_animal1 = $_POST['nome_animal1'];
    $nome_animal2 = $_POST['nome_animal2'];
    $nome_animal3 = $_POST['nome_animal3'];
    /*$foto_animal1 = $_POST['foto_animal1'];
    $foto_animal2 = $_POST['foto_animal2'];
    $foto_animal3 = $_POST['foto_animal3'];*/
    $rua = $_POST['rua'];
    $cep = $_POST['cep'];
    $numero = $_POST['numero'];
    $bairro = $_POST['bairro'];
    $pais = $_POST['pais'];
    $estado = $_POST['estado'];
    $cidade = $_POST['cidade'];
    $obs = $_POST['obs'];


        $result = mysqli_query($conexao, "INSERT INTO usuario_dono_pet(cpf,email,senha,nome,telefone,tipo_animal_1,tipo_animal_2,tipo_animal_3,nome_animal_1,nome_animal_2,nome_animal_3,idade_animal_1,idade_animal_2,idade_animal_3,logradouro,CEP,numero,bairro,pais,estado,cidade,imagem_animal_1,imagem_animal_2,imagem_animal_3,obs)  
        VALUES ('$cpf','$email','$password','$nome','$telefone','$tipoAnimal1','$tipoAnimal2','$tipoAnimal3','$nome_animal1','$nome_animal2','$nome_animal3','$idade_animal1','$idade_animal2','$idade_animal3','$rua','$cep','$numero','$bairro','$pais','$estado','$cidade',' ',' ',' ','$obs') ");
        

        $msg = false;
        
        if(isset($_FILES['foto_perfil'])){
                    
                 $extensao = strtolower(substr($_FILES['foto_perfil']['name'], -4)); //pega a extensão
                 $novo_nome = md5(time()).$extensao; //define o nome do arquivo
                 $diretorio = "upload/";//define o diretorio para onde enviaremos o arquivo
                 move_uploaded_file($_FILES['foto_perfil']['tmp_name'], $diretorio.$novo_nome); //efetua o upload   

                
        

                    $sql_code = "INSERT INTO imagem_Pet (id, imagem_perfil, calendar, id_donoPet ) VALUES (null, '$novo_nome', now(), '0');"; 
                
                    $atualizado = "UPDATE imagem_Pet set id_donoPet = (SELECT id_dono_pet FROM usuario_dono_pet WHERE id_dono_pet order by id_dono_pet desc limit 1) where id order by id desc limit 1;";

                    if(mysqli_query($conexao, $sql_code)){
                        $msg = "Arquivo enviado com sucesso!";
                    }else{
                        $msg = "Falha ao enviar arquivo!";
                    }
                        echo $msg;

                    if(mysqli_query($conexao, $atualizado)){
                        $msg = "Atualizado";
                    }else{
                        $msg = "Falha";
                    }

        }

        header('Location: loginUsuario.php');


        
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


             <center> <img src="img/top.png" alt="Imagem do topo." width="100%" ></center>



        <title>Cadastro do dono de pet</title>

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

        <div id="cadastro">

            <form action="CadastroDonoPet.php" method="POST"  class="card1" enctype="multipart/form-data">


                <div class="card-header">
                    <h2>Cadastro de Usuário Dono de Pet </h2>
                </div>

                <div class="card-content">

                    <div class="card-content-area">
                       <br>
                        <label><u><b>DADOS DE LOGIN</b></u></label>
                        <br><br>
                        <label>*Email</label>
                        <br><input type="email" name="email" required >
                    </div>

                    <div class="card-content-area">
                        <br><label for="password">*Senha</label>
                        <br><input type="password" name="password"  required minlength="6" maxlength="10" aria-describedby="passwordHelpInline">
                        <br><small id="passwordHelpInline"  class="text-white">
                        Crie uma senha com no mínimo 6 e no máximo 10 caracteres.
                        </small>
                        <br>
                        <hr>
                    </div>


                    <div class="card-content-area">
                    <br><label><u><b>DADOS PESSOAIS</b></u></label>
                        <br><br>
                        <label>*Nome Completo</label>
                        <br><input type="text" name="nome" required>
                    </div>


                    <div class="card-content-area">
                        <br><label>*CPF</label>
                        <br><input type="text" name="cpf" required pattern="(\d{3}\.?\d{3}\.?\d{3}-?\d{2}))" aria-describedby="passwordHelpInline">
                        <br><small id="passwordHelpInline"  class="text-white">
                        Digite seu CPF(Cadastro de Pessoa Física) sem pontos ou traços.
                        </small>
                        <br>
                    </div>
                    

                    <div class="card-content-area">
                     <br><label>*Telefone para contato</label>
                        <br><input type="text" name="tel" required pattern="(\d{2}\.?\d{1}\.?\d{4}-?\d{4})" aria-describedby="passwordHelpInline">
                        <br><small id="passwordHelpInline"  class="text-white">
                        Digite o número sem pontos ou traços e não se esqueça do DDD.
                        </small>
                        <br>
                    </div>
                    
                    <div class="card-content-area">
                        <br><label>*Nos envie uma foto para usar de perfil: </label>
                        <br><input type="file" accept=".jpg, .jpeg, .png" name="foto_perfil"  required aria-describedby="passwordHelpInline">
                        <br>
                        <hr>
                    </div>
                     
                   

                    <div class="card-content-area">
                        <br><label><u><b>DADOS DOS PETS</b></u></label>
                        <br><br>
                        <label for="animal1">*Meu Animal 1 é:</label></div>
                        <select name="tipo_animal1"> 
                        <option value="cachorro">Cachorro</option> 
                        <option value="gato">Gato</option> 
                        <option value="passaro">Pássaro</option>  
                        </select>


                    <div class="card-content-area">
                        <br><label for="animal2">Meu Animal 2 é:</label></div>
                        <select name="tipo_animal2"> 
                        <option value="nao_tem">Não tenho</option>
                        <option value="cachorro">Cachorro</option> 
                        <option value="gato">Gato</option> 
                        <option value="passaro">Pássaro</option>
                        </select>


                    <div class="card-content-area">
                        <br><label for="animal3">Meu Animal 3 é:</label></div>
                        <select name="tipo_animal3"> 
                        <option value="nao_tem">Não tenho</option>
                        <option value="cachorro">Cachorro</option> 
                        <option value="gato">Gato</option> 
                        <option value="passaro">Pássaro</option>   
                        </select>
                        <br>

                    <div class="card-content-area">
                        <br><label>*Qual a idade do animal 1? </label>
                        <br><input type="number" max="99" min="0" name="idade_animal1" requiredaria-describedby="passwordHelpInline">
                        <small id="passwordHelpInline" class="text-white">
                        (em anos)
                        </small> 
                    </div>

                    <div class="card-content-area">
                        <br><label>Qual a idade do animal 2?</label>
                        <br><input type="number" max="99" min="0" name="idade_animal2" aria-describedby="passwordHelpInline">
                        <small id="passwordHelpInline" class="text-white">
                        (em anos)          
                        </small>  
                    </div>

                    <div class="card-content-area">
                        <br><label>Qual a idade do animal 3? </label>
                        <br><input type="number" max="99" min="0" name="idade_animal3" aria-describedby="passwordHelpInline">
                        <small id="passwordHelpInline" class="text-white">
                        (em anos)
                        </small>          
                    </div>

                     <div class="card-content-area">
                        <br><label>*Qual o nome do animal 1 ?</label>
                        <br><input type="text" name="nome_animal1" maxlength="20" required>
                    </div>

                    <div class="card-content-area">
                        <br><label>Qual o nome do animal 2 ?</label>
                        <br><input type="text"  name="nome_animal2" maxlength="20">           
                    </div>

                    <div class="card-content-area">
                        <br><label>Qual o nome do animal 3 ?</label>
                        <br><input type="text"  name="nome_animal3" maxlength="20">             
                    <br>
                    <hr> 
                    </div>
                    

                    <div class="card-content-area">
                        <br><label><b><u>ENDEREÇO</u></b></label>
                        <p>Fique tranquilo, pois seu endereço não ficará disponível para os prestadores de serviço.</p>
                        <label>*Rua: </label>
                       <br> <input type="text" name="rua" required>
                    </div>

                    <div class="card-content-area">
                        <label>*CEP:</label>
                        <br><input type="text" name="cep" required pattern="(\d{2}\.?\d{3}\.?\d{3})" aria-describedby="passwordHelpInline">
                        <small id="passwordHelpInline" class="text-white" >
                        Sem pontos ou traços.
                        </small>
                    </div>

                    <div class="card-content-area">
                        <br><label>*Número:</label>
                        <br><input type="text" name="numero" minlength="1" maxlength="4" required>
                    </div>

                    <div class="card-content-area">
                        <br><label>*Bairro:</label>
                        <br><input type="text" name="bairro" required>
                    </div>

                    <div class="card-content-area">
                        <br><label for="pais">*País:</label> </div>
                        <select name="pais"> 
                         <option value="br">Brasil</option> 
                         </select>

                    <div class="card-content-area">
                        <br><label for="estado">*Estado:</label></div>
                        <select name="estado"> 
                        <option value="sp">São paulo</option> 
                        </select>


                    <div class="card-content-area">
                        <br><label for="cidade">*Cidade:</label></div>
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
                        </select>


                    <div class="card-content-area">
                        <br><label>*Fale um pouco sobre o/os bichano/os, diga o que achar relevante, como alguma alergia, o porte, a raça, alguma doença ou costume: </label>
                        <br>
                        <textarea name="obs"  required></textarea>
                    </div>



                </div>

                <div class="card-footer">

                    <input type="submit" name="submit" class="btn btn-primary" value="Cadastrar" class="submit">
                </div>

            </form>


            




        </div>


     

<!-- RODAPE -->

<?php
 include('rodape.php');
 ?>
   