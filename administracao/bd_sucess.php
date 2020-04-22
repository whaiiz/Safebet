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

	$idUtilizador=$_GET["idUtilizador"];
	$nome=$_GET["nome"];
	$sobrenome=$_GET["sobrenome"];
	$data_nasc=$_GET["data_nasc"];
	$email=$_GET["email"];
	$password=$_GET["password"];
	$dinheiro=$_GET["coins"];



	$sql = "UPDATE utilizador SET nome= '$nome', sobrenome='$sobrenome',data_nasc='$data_nasc',email='$email',password='$password',dinheiro='$dinheiro' WHERE idUtilizador='$idUtilizador'";

    // Prepare statement
    $stmt = $connect->prepare($sql);

    // execute the query
    $stmt->execute();

    // echo a message to say the UPDATE succeeded
    echo //$stmt->rowCount() . 
    " Update feito com sucesso <br>";



  ?>

 <a href="user.php">Voltar</a>








