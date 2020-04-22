<?php



	include("ligacao_bd.php");

		session_start();
		$dinheiro=$_SESSION["dinheiro"];
		$dinheiroGanho=$_GET["dinheiroApostado"];
		$idUtilizador=$_SESSION["idUtilizador"];

		$vencedor=$_GET["final"];

		if($vencedor=="P"){

			$dinheiro=$dinheiro+$dinheiroGanho;

		}else{

			$dinheiro=$dinheiro-$dinheiroGanho;
		}


	

		try {

		$sql = "UPDATE `utilizador` SET dinheiro='$dinheiro' WHERE `idUtilizador`='$idUtilizador'";
		$stmt = $connect->prepare($sql);
		$stmt->execute();

		}catch(PDOException $e){
				 
		}






$dinheiroApostado=$_GET["dinheiroApostado"];
$vencedor=$_GET["final"];
$idUtilizador=$_SESSION["idUtilizador"];

 $sql = <<<END
  
      insert into blackjackaposta(dinheiroApostado,vencedor,idUtilizador)
        values(?,?,?)   
END;
      $comandoSQL=$connect->prepare($sql);
      $comandoSQL->bindParam(1,$dinheiroApostado);
      $comandoSQL->bindParam(2, $vencedor);
      $comandoSQL->bindParam(3, $idUtilizador);
      $comandoSQL->execute();

?>



