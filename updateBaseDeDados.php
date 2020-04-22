
	
	<?php


		// $dinheiro="<script>document.write(dinheiro)</script>"

	include("ligacao_bd.php");

		session_start();

		$idUtilizador=$_SESSION["idUtilizador"];

		$dinheirobd=$_GET["dinheiro"];


		try {

		$sql = "UPDATE `utilizador` SET dinheiro='$dinheirobd' WHERE `idUtilizador`='$idUtilizador'";
		$stmt = $connect->prepare($sql);
		$stmt->execute();

		}catch(PDOException $e){
				 
		}

?>

<?php 


$dinheiroApostado=$_GET["dinheiroApostado"];
$corApostada=$_GET["corApostada"];
$final=$_GET["final"];
$idUtilizador=$_SESSION["idUtilizador"];

 $sql = <<<END
  
      insert into apostaroleta (dinheiroApostado,corApostada,final,idUtilizador)
        values(?,?,?,?)   
END;
      $comandoSQL=$connect->prepare($sql);
    

      $comandoSQL->bindParam(1,$dinheiroApostado);
      $comandoSQL->bindParam(2, $corApostada);
      $comandoSQL->bindParam(3, $final);
      $comandoSQL->bindParam(4, $idUtilizador);
      
      
      $comandoSQL->execute();

      

       

?>


