<!DOCTYPE html>

<?php

  require_once("ligacao_bd.php");

  date_default_timezone_set('Portugal');


  function idade($data_nascimento){

  $dn= new DateTime($data_nascimento);
  $agora=new DateTime();
  $idade=$agora->diff($dn);
  return $idade->y;

  }
  
  //$data=date('d/m/Y H:i:s');
  //echo $data;
  //$aniversario = new DateTime('2004-05-13');
  //echo $data->diff($aniversario)->y;

  if(isset($_POST["register"])){

      echo strlen($_POST["password"]);

      // verificar a idade do utilizador
      $idade=idade($_POST['data_nasc']);


      // Verificar se o email já existe

        $sql = "SELECT COUNT(email) AS num FROM utilizador WHERE email = :email";
        $stmt = $connect->prepare($sql);
        
        //Bind the provided username to our prepared statement.
        $email=$_POST['email'];
        $stmt->bindValue(':email', $email);
        
        //Execute.
        $stmt->execute();
        
        //Fetch the row.
        $row = $stmt->fetch(PDO::FETCH_ASSOC);


      if(empty($_POST["nome"]) || empty($_POST["sobrenome"]) || empty($_POST["data_nasc"]) || empty($_POST["email"])|| empty($_POST["password"]) || empty($_POST["confirmacaoPassword"])){  
                $message = '<label>Preencha o todos os campos</label>';  


          }elseif($_POST["password"]!=$_POST["confirmacaoPassword"]){

        $message = '<label>Passwords Diferentes</label>';

          }elseif(strlen($_POST["password"])<8){

              $message = '<label>Password tem que ter mais que 8 caracteres</label>';


          }elseif($idade<18){

        $message='<label> Para entrares tens que ser maior de 18 </label>';

          }elseif($row['num']>0){

                $message='<label> Esse email j&aacute; est&aacute; registado no site</label>';

      }


          else{

        
        //If the provided username already exists - display error.
        //TO ADD - Your own method of handling this error. For example purposes,
        //I'm just going to kill the script completely, as error handling is outside
        //the scope of this tutorial

      $nome=$_POST['nome'];
      $sobrenome=$_POST['sobrenome'];
      $data_nasc=$_POST['data_nasc'];
      $email=$_POST['email'];
      $password=$_POST['password'];
      $dinheiro=0;
      $sql = <<<END
  
      insert into utilizador (nome,sobrenome,data_nasc,email,password,dinheiro)
        values(?,?,?,?,?,?)   
END;
      $comandoSQL=$connect->prepare($sql);
    

      $comandoSQL->bindParam(1,$nome);
      $comandoSQL->bindParam(2, $sobrenome);
      $comandoSQL->bindParam(3, $data_nasc);
      $comandoSQL->bindParam(4, $email);
      $comandoSQL->bindParam(5,  $password);
      $comandoSQL->bindParam(6, $dinheiro);
      
      $comandoSQL->execute();

      $message='<label>Utilizador Registado com sucesso</label>';

      }
      
       }

?>



 

 <html>

<head>
    <link rel="shortcut icon" HREF="imagens/SafebetLogo.png">
    <link rel="stylesheet" href="css/login.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</head>
<img src="imagens/SafebetLogo.png" id="logo" 
  width=100
  height=100 > 
<div class="login-page">

  <div class="form">
    <form class="login-form" method="POST">
    <?php

        if(isset($message)){
            echo '<label class="text-danger">'.$message.'</label>';
        }
      ?>
       
      <input type="text" placeholder="Nome" id="nome" name="nome">
      <input type="text" placeholder="Sobrenome" id="sobrenome" name="sobrenome">
      <input type="date" placeholder="Data De Nascimento" id="data_nasc" name="data_nasc"> 
      <input type="text" placeholder="Email" id="email" name="email">
      <input type="password" placeholder="Password" id="password" name="password">
      <input type="password" placeholder="Confirma&ccedil;&atilde;o Password" id="confirmacaoPassword" name="confirmacaoPassword">
        <button type="submit" id="register" name="register"> Registar</button>
      <p class="message">J&aacute tem conta? <a href="login.php">Voltar Ao Login</a></p>
    </form>
  </div>
</div>

