<html>
	<head>
			
	<meta charset="UTF-8">
	<title>SafeBet - Your roulette online game</title>
	<link rel="shortcut icon" HREF="imagens/SafebetLogo.png">
	<!-- import sylesheets -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
	<link rel="stylesheet" href="css/blackjack.css">
	
	<script src="http://code.jquery.com/jquery-latest.min.js"></script>

	<!-- end of stylesheets-->
	<!-- import javascript-->

	<?php 

		include("navbar.html");
		include("ligacao_bd.php");
	?>



	</head>
	<body background="imagens/casino2.jpg">


		<?php

		session_start();

		$email=$_SESSION["email"];
		if(empty($email)){

		header('location:login.php') ;

		}else{

		$sql = "SELECT * FROM utilizador where email='$email'";  
			 	$stm = $connect->prepare($sql);  
			 	$stm->execute();  
			 	$dados = $stm->fetchAll(PDO::FETCH_OBJ);  
			 	foreach($dados as $reg):  
			    echo 'Moedas: ' . $reg->dinheiro . "";
			    $dinheiro=$reg->dinheiro;

				endforeach;

		if(isset($_POST["inicia"])){

			if(($_POST["dinheiroApostado"]<10)){  
         		
         		$message = '<label>Tem que apostar no minímo 10 coins <br></label>';  
			
			}else if($_POST["dinheiroApostado"]>$dinheiro){
			
				$message='<label>O seu saldo é insuficiente para fazer essa aposta </label>';

			}else{
				
				// $dinheiro=$dinheiro-$_POST["dinheiroApostado"];
				$_SESSION["dinheiroApostado"]=$_POST["dinheiroApostado"];

				try{
					
					$sql = "UPDATE `utilizador` SET dinheiro='$dinheiro' WHERE `email`='$email'";
					$stmt = $connect->prepare($sql);
					$stmt->execute();

				}catch(PDOException $e){
							 
				}
		
				header("location:blackjack.php");
			}
      	}
		?>
<div class="login-page">
  <div class="form">
  	
	<form method="POST">

		<h3> Dinheiro A Apostar </h3>
		<input type="number" id="dinheiroApostado" name="dinheiroApostado" style="height: 50px;"> 
		<button type="submit" id="inicia" name="inicia"  class="btn btn-primary">Iniciar</button> <br>

		<?php
        
        if(isset($message)){
            echo '<label class="text-danger">'.$message.'</label>';
        }
      	
      	?>
	</form>

</div>
</div>		
	

	</body>

</html>

<style>

body{

	background-color: white;

}

#aposta{
	
	text-align: center;

}

h3{

	font-family: "Segoe UI";
	color:black;

}

</style>

<?php

}


?>