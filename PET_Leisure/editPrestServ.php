<?php


if(!empty($_GET['id'])){


    include_once('Config.php');

    $id =  $_GET['id'];

    $sqlSelect = "SELECT * FROM usuario_prest_serv WHERE id_prest_serv=$id;";

    $result = $conexao->query($sqlSelect);

    if($result->num_rows>0){
        while($user_data = mysqli_fetch_assoc($result)){
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
        header('location: perfilPrestServ.php');
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
        
                <li><a href="sairPrestServ.php">Sair</a></li>

                </li>
                </ul>
              </div><!-- /.navbar-collapse -->
            </div><!-- /.container-fluid -->
          </nav>

</div>

        <div id="cadastro">

            <form action="saveEditPrestServ.php" method="POST"  class="card1" >

                <div class="card-header">

                    <h2>Meu Perfil </h2>

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

                        <label>CPF/CNPJ</label>
                        <p>Seu documento de identidade(impossível alterar)</p>
                        <input type="text" name="docIdentidade"  
                        required pattern="(\d{3}\.?\d{3}\.?\d{3}-?\d{2}))" value="<?php echo $docIdentidade?>" readonly>

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
                        <label>*Nos envie imagem sua ou de sua logo para servir de perfil:</label>
                        <input type="file" name="perfil" required >
                    </div>
                    <br> 

                    <div class="card-content-area">
                       
                    <label >*Quais serviços você ira fornecer?</label></div>
                    <P>Hospedagem/Diária</p>
                    <select name="hospedagem"> 
                        <option value="sim" >Sim</option>
                        <option value="nao" >Não</option> 
                    </select>
                    
                    <br><br> 
                    <p>Creche/Semanal ou Mensal</p>
                    <select name="creche"> 
                        <option value="sim" >Sim</option>
                        <option value="nao" >Não</option> 
                    </select>
                    <hr><br>
                   
                    
                    
                    <div class="card-content-area">
                        
                        <label>*Quantos animais no total o local tem condições de acomodar por dia?</label>
                        <input type="number" max="10" min="1" name="qtdAnimais" required>
                    
                    </div>
                    <br> 

                    <div class="card-content-area">
                        <label>Se houver, nos envie certificações ou experiências relacionadas na area: </label>
                        <input type="file" name="certificacao" multiple>
                    </div>
                    <br> 

                    <div class="card-content-area">
                    <label>*Valor cobrado pelo Serviço: </label>
                    <input type="text" name="precoReserva" required value="<?php echo $precoReserva ?>">
                    </div>

                    <div class="card-content-area">
                        <label>*Nos envie imagens do local onde será realizado os trabalhos:</label>
                        <input type="file" name="local" required multiple>
                    </div>
                    <br> 

                    <div class="card-content-area">
                       
                        <label>*Quais animais são aptos a usufruir desse local? </label></div>
                        <p>Cachorro</p>
                        <select name="cachorro">
                        <option value="sim">Sim</option>
                        <option value="nao" >Não</option>
                        <option ><?php echo $aceitaCachorro?></option>
                        </select>
                        <hr><br>
                        <p>Gato</p>
                        <select name="gato">
                        <option value="sim">Sim</option>
                        <option value="nao" >Não</option>
                        <option ><?php echo $aceitaGato?></option>
                        </select>
                        <hr><br>
                        <p>Pássaro</p>
                        <select name="passaro">
                        <option value="sim">Sim</option>
                        <option value="nao" >Não</option>
                        <option ><?php echo $aceitaPassaro?></option>
                        </select>
                        <hr><br>
              
                     </div>
             
                     </div> 


                    <div class="card-content-area">

                        <br><br><br><label>ENDEREÇO</label>
                        <p>Ele servirá para que os donos de pet consigam te encontrar.</p>

                        <b></b><label>*Rua: </label>
                        <input type="text" name="logradouro" required value="<?php echo $logradouro ?>">

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
                        <label>*Fale um pouco sobre você e o ambiente para aconchego dos bichanos, diga o que achar relevante: </label>
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
   