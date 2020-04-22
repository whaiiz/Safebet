<?php

session_start();
ini_set('arg_separator.output', '&amp;');


if(isset($_SESSION['dealer_card_a']) && isset($_SESSION['dealer_card_b']) && isset($_SESSION['dealer_card_sum'])){

	$dealer_sum=$_SESSION['dealer_card_sum'];

	// ADICIONAR CARTA c PARA SOMAR
	if(isset($_SESSION['dealer_card_c'])){

		$dealer_card_c=$_SESSION['dealer_card_c'];
	}


	// Checkar a soma do jogador e do dealer
	$number=explode("_",$dealer_card_c);

	

	if($number[0]==1){ // AS
		$dealer_sum=$dealer_sum+11;
	}elseif($number[0]==11 OR $number[0]==12 OR $number[0]==13){
		$dealer_sum=$dealer_sum+11;
	}else{
		$dealer_sum=$dealer_sum+$number[0];
	}

	


	// SOMAR A CARTA D

	if(isset($_SESSION['dealer_card_d'])){

		$dealer_card_d=$_SESSION['dealer_card_d'];
	


	// Checkar a soma do jogador e do dealer
	$number=explode("_",$dealer_card_d);

	

	if($number[0]==1){ // AS
		$dealer_sum=$dealer_sum+11;
	}elseif($number[0]==11 OR $number[0]==12 OR $number[0]==13){
		$dealer_sum=$dealer_sum+11;
	}else{
		$dealer_sum=$dealer_sum+$number[0];
	}

}
	echo $dealer_sum;
}


?>