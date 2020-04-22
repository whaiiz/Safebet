<!DOCTYPE html>
<html>
<head>
	<title>Safebet-Mensagens Para A Administração</title>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
 	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
  	<link rel="shortcut icon" HREF="imagens/SafebetLogo.png">
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

	<?php
		include("navbar.html");
	?>

</head>
<body>
	<?php

	include("ligacao_bd.php");

	session_start();

	$email=$_SESSION["email"];

	if(empty($email)){

		header("location:login.php");
	}else{

	if(isset($_POST["submit"])){

      if(empty($_POST["email"]) || empty($_POST["assunto"]) || empty($_POST["mensagem"])){  

      	$message='<label> Tem de preencher todos os campos </label>';

      }else{

      	$message='<label> A sua mensagem foi enviada com sucesso </label>';

	

	$idUtilizador=$_SESSION["idUtilizador"];
	$email=$_POST["email"];
	$assunto=$_POST["assunto"];
	$mensagem =$_POST["mensagem"];
$sql=<<<END

	insert into reclamacoes(Assunto,texto,email,idUtilizador)
        values(?,?,?,?)   
END;
      $comandoSQL=$connect->prepare($sql);
    

      $comandoSQL->bindParam(1,$assunto);
      $comandoSQL->bindParam(2, $mensagem);
      $comandoSQL->bindParam(3, $email);
      $comandoSQL->bindParam(4, $idUtilizador);
 
      
      $comandoSQL->execute();

	}
  

}
?>
	<div class="container">
			<div class="row">
				<div class="col-md-8" style="margin:0 auto; float:none;">
					<h3 align="center">Mandar mensagem aos administradores</h3>
					<br />

					
			
					<form method="post" action="">
				 		<div class="form-group">
						<?php

				        if(isset($message)){
				            echo '<label class="text-danger">'.$message.'</label> <br>';
				        }
     					?>
							<label>Email</label>
							<input type="text" id="email" name="email" class="form-control" placeholder="Email" value="" />
						</div>
						<div class="form-group">
							<label>Assunto</label>
							<input type="text" id="assunto" name="assunto" class="form-control" placeholder="Assunto" value="" />
						</div>
						<div class="form-group">
							<label>Mensagem</label>
							<textarea id="mensagem" name="mensagem" class="form-control" placeholder="Mensagem"></textarea>
						</div>
						<div class="form-group" align="center">
							<input type="submit" id="submit" name="submit" value="Submit" class="btn btn-info" />
						</div>
					</form>
						<script>

				

	</script>
				</div>
			</div>
		</div>

</body>
</html>


<?php

}


?>