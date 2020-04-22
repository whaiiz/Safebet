<?php

session_start();
ini_set('arg_separator.output', '&amp;');


if(isset($_SESSION['player_card_a']) && isset($_SESSION['player_card_b']) && isset($_SESSION['player_card_sum'])){

	$player_sum=$_SESSION['player_card_sum'];



	// ADICIONAR CARTA c PARA SOMAR
	if(isset($_SESSION['player_card_c'])){

		$player_card_c=$_SESSION['player_card_c'];
	}


	// Checkar a soma do jogador e do dealer
	$number=explode("_",$player_card_c);

	

	if($number[0]==1){ // AS
		$player_sum=$player_sum+11;
	}elseif($number[0]==11 OR $number[0]==12 OR $number[0]==13){
		$player_sum=$player_sum+11;
	}else{
		$player_sum=$player_sum+$number[0];
	}

	


	// SOMAR A CARTA D

	if(isset($_SESSION['player_card_d'])){

		$player_card_d=$_SESSION['player_card_d'];


	// Checkar a soma do jogador e do dealer
	$number=explode("_",$player_card_d);

	

	if($number[0]==1){ // AS
		$player_sum=$player_sum+11;
	}elseif($number[0]==11 OR $number[0]==12 OR $number[0]==13){
		$player_sum=$player_sum+11;
	}else{
		$player_sum=$player_sum+$number[0];
	}

}

		
		echo $player_sum;


}


?>