<html>

<head>

<link rel="stylesheet" href="../css/paypal.css">

</head>


<body background="#4ebbf0">


<?php
	
	use PayPal\Api\Payment;
	use PayPal\Api\PaymentExecution;

	require 'app/start.php';

	if(!isset($_GET['success'],$_GET['paymentId'],$_GET['PayerID'])){

		die();

	}
	
	if((bool)$_GET['success']==false){

		die();
	}

	$paymentId=$_GET['paymentId'];
	$payerId=$_GET['PayerID'];

	$payment=Payment::get($paymentId,$paypal);

	$execute=new PaymentExecution();
	$execute->setPayerId($payerId);

	try{

		$result=$payment->execute($execute,$paypal);

	}catch(Exception $e){

		$data=json_encode($e->getData());
		echo $data->message;
		die();
	}

	echo "Pagamento feito Obrigado";

	


?>

<a href="../index.php"> Voltar </a>


<?php 

include ("../ligacao_bd.php");	

session_start();
 

$paymentID=$_GET["paymentId"];
$payerID=$_GET["PayerID"];




$preco=$_SESSION["price"];


if($preco==5.99){

	$coins=50;

}elseif($preco==9.99){

	$coins=100;

}elseif($preco==23.99){

	$coins=250;

}elseif($preco==45.99){

	$coins=500;

}elseif($preco==89.99){

	$coins=1000;
}else{

	$coins=0;
	echo "erro na compra";

}


$idUtilizador=$_SESSION["idUtilizador"];
// $dinheiro_pago=$_SESSION["price"];


echo " <br> Comprou " .$coins. " coins"."<br>";



$sql=<<<END
insert into pagamentos(idPagamentoDPaypal,idBuyerDPaypal,idUtilizador,coins_compradas,dinheiroPago)
        values(?,?,?,?,?)
END;


      $comandoSQL=$connect->prepare($sql);
    


      $comandoSQL->bindParam(1, $paymentId);
      $comandoSQL->bindParam(2, $payerId);
      $comandoSQL->bindParam(3, $idUtilizador);
      $comandoSQL->bindParam(4, $coins);
      $comandoSQL->bindParam(5, $preco);
      
      $comandoSQL->execute();

      // BUSCAR O DINHEIRO  ATUAL DO UTILIZADOR
        $query = "SELECT dinheiro FROM utilizador where idUtilizador='$idUtilizador'";  
         $data = $connect->query($query);  
          foreach($data as $row){
           $dinheiro=$row['dinheiro'];
	
	       }

	       // INCREMENTAR O AS COINS

	       $dinheiro=$dinheiro+$coins;




	// DAR UPDATE AO DINHEIRO DO UTILIZADOR
	try {
		$sql = "UPDATE `utilizador` SET dinheiro='$dinheiro' WHERE `idUtilizador`='$idUtilizador'";
		$stmt = $connect->prepare($sql);
		$stmt->execute();

	}catch(PDOException $e){
				 
	}






?>
</body>
</html>
