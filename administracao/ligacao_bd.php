<?php

$host="localhost";
$username="root";
$password="";
$database="safebet1";
$message="";

try{

	$connect=new PDO("mysql:host=$host;dbname=$database",$username,$password);
	$connect->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

}
catch(PDOException $error){

		$message=$error->getMessage();


}


function updateUtilizador($idUtilizador){


	$idUtilizador=$_GET["utilizador"];
	$email=$_GET["email"];
	$nome=$_GET["nome"];
	$sobrenome=$_GET["sobrenome"];
	$data_nasc=$_GET["data_nasc"];
	$password=$_GET["password"];
	$coins=$_GET["coins"];




	try {
		$sql = "UPDATE `utilizador` SET `email`=$email, `nome`=$nome, `sobrenome`=$sobrenome,`data_nasc`=$data_nasc ,`password`=$password,`dinheiro`=$coins WHERE `idUtilizador`=1";
		$stmt = $connect->prepare($sql);
		$stmt->execute();

	}catch(PDOException $e){
				 
	}


}
	

?>

