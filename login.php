

<?php
  
  session_start();

  include("ligacao_bd.php");


  // login

  if(isset($_POST["login"])){
      if(empty($_POST["email"]) || empty($_POST["password"])){  
         $message = '<label>Preencha o Email com a sua Password</label>';  
      }else{
      $query="select *from utilizador
       WHERE email=:email AND password=:password";
      $statement=$connect->prepare($query);
      $statement->execute(
        array(
          'email'=>$_POST["email"],
          'password'=>$_POST["password"]
        )
      );
      $count=$statement->rowCount();
      if($count>0){
        $_SESSION["email"]=$_POST["email"];
        $_SESSION["idUtilizador"]=$_POST["idUtilizador"];
        
        header("location:index.php");
      }else{
        $message='<label>Informa&ccedil;&atilde;o Incorreta </label>';
      }
    }
  }
// REGISTER



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
    <title> Safebet - LOGIN </title>
</head>

     <img src="imagens/SafebetLogo.png" id="logo" > 



<div class="login-page">
  <div class="form">
    <form class="login-form" method="POST">


    <?php

        if(isset($message)){
            echo '<label class="text-danger">'.$message.'</label>';
        }
      ?>
      <input type="text" placeholder="Email" id="email" name="email">
      <input type="password" placeholder="Password" id="password" name="password">
      <button type="submit" id="login" name="login">Log In </button>
     
      <p class="message">N&atilde;o Registado? <a href="register.php">Crie uma conta</a></p>
    </form>
  </div>
</div>

