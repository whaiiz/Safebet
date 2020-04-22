<?php

session_start();
ini_set('arg_separator.output', '&amp;');


// Resetar os parametros



if(isset($_SESSION['cards'])){

	$cards=$_SESSION['cards'];


	// Ver O tamanho
	$size=sizeof($cards);


		// Carta Random Para o jogador

		$rand_keys=array_rand($cards,1);
		$rand_card=$cards[$rand_keys];
		unset($cards[$rand_keys]);

		if($size==48){
			// Buscar A Primeira Carta
			$player_card_c="$rand_card";
			$_SESSION['player_card_c']="$rand_card";
		}
		if($size==47 OR $size==46){
			// Buscar A segunda Carta 
			$player_card_d="$rand_card";
			$_SESSION['player_card_d']="$rand_card";
		}

		// Mostrar Cartas

		if(isset($_SESSION['player_card_c'])){

			$card_c=$_SESSION['player_card_c'];

			if($card_c!=""){


			
			echo "<img src=\"images/$card_c.jpg\" alt=\"images/$card_c.jpg\" width=\"160\" height=\"232\" />";
		
			}

		}
		if(isset($_SESSION['player_card_d'])){

			$card_d=$_SESSION['player_card_d'];
			
			if($card_d!=""){


			
			echo "<img src=\"images/$card_d.jpg\" alt=\"images/$card_d.jpg\" width=\"160\" height=\"232\" />";
			
			}

		}
		// Update da sessão
		$_SESSION['cards']=$cards;
}


?>