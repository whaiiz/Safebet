<?php
	include("ligacao_bd.php");
	session_start();
	ini_set('arg_separator.output', '&amp;');
	$_SESSION['player_Card_c']="";
	$_SESSION['player_card_d']="";
	$_SESSION['dealer_card_c']="";
	$_SESSION['dealer_card_d']="";
	$dinheiro=$_SESSION["dinheiro"];

	$dinheiroApostado=$_SESSION["dinheiroApostado"];
	$dinheiroADescontar=$dinheiro-$dinheiroApostado;
	$email=$_SESSION["email"];

		try{
					
			$sql = "UPDATE `utilizador` SET dinheiro='$dinheiroADescontar' WHERE `email`='$email'";
			$stmt = $connect->prepare($sql);
			$stmt->execute();
		}catch(PDOException $e){
							 
		}
		
?>

<html>
<head>

	<script>
		var final="D";
	</script>
	<title>SafeBet-BlackJack</title>
	<!-- //Site CSS -->
	<!-- Special CSS -->
	<!-- <link rel=\"stylesheet\" type=\"text/css\" href=\"_css/index.css\" /> -->
	<!-- //Special CSS -->
	<link rel="shortcut icon" HREF="imagens/SafebetLogo.png">
	<meta charset="utf-8"/>	
	<meta name=\"viewport\" content=\"width=device-width; initial-scale=1.0;\"/>
	<!-- jQuery -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<!-- BOOTSTRAP-->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
 
	


<?php 
	include("navbar.html");	
?>

<!-- Draw Or Stand -->
	<script>

		var dinheiroApostado = "<?php echo $dinheiroApostado; ?>";
		$( document ).ready(function() {

		
		       $('#hit_submit_button').click(function (evt){

		       		   
				      //evt.preventDefault();
		             // var myQuery = $('#queryText').val(); 	      
						// load data received from php script into the dom container

						var playerSum = parseFloat($('#player_sum').val()) || 0;
     					var dealerSum = parseFloat($('#dealer_sum').val()) || 0; 

     					if(playerSum>21 && dealerSum<=21){
							
							final="d";
							$("#winner").html("Você passou dos 21 pontos");
							$.get('updateBaseDeDadosBlackjack.php?dinheiroApostado='+dinheiroApostado+'&final='+final,function(result){
					 		});
					 		$('#stand_submit_button').prop("disabled", true);
							$('#hit_submit_button').prop("disabled", true);
							$('#voltar').prop("disabled", false);
		             	 	 
		                }else if(dealerSum>21 && playerSum<=21){

		                	final="p";
							$("#winner").html("O dealer passou dos 21 pontos");
							$.get('updateBaseDeDadosBlackjack.php?dinheiroApostado='+dinheiroApostado+'&final='+final,function(result){
					 		});
					 		$('#stand_submit_button').prop("disabled", true);
							$('#hit_submit_button').prop("disabled", true);
							$('#voltar').prop("disabled", false);
						
						}else if(dealerSum>21 && playerSum>21){

							final="d";
							$("#winner").html("Você passou dos 21 pontos");
							$.get('updateBaseDeDadosBlackjack.php?dinheiroApostado='+dinheiroApostado+'&final='+final,function(result){
					 		});
					 		$('#stand_submit_button').prop("disabled", true);
							$('#hit_submit_button').prop("disabled", true);
							$('#voltar').prop("disabled", false);
						
						}

		                else{

		              	  	$('#player_Card_c').load('load_getData.php', { query:null, anotherVar:null }).delay(800);
							var sorteio=Math.floor(Math.random() * 2);
		                	



						if(dealerSum<=17 && dealerSum>=14 && sorteio==1){

							$('#dealer_card_c').load('load_get_dealer_card.php', { query:null, anotherVar:null }).delay(800);
		             	
		             	}else if(dealerSum<14){

		             		$('#dealer_card_c').load('load_get_dealer_card.php', { query:null, anotherVar:null }).delay(800);

		             	}

						}

		                // UPDATE A SOMA DAS CARTAS
						$.get('load_get_sum.php',function(result){
		   				$('#player_sum').val(result);
		   				});
		   				

		   				  // UPDATE A SOMA DAS CARTAS do dealer

		              	$.get('load_get_dealer_sum.php',function(result){
		   				$('#dealer_sum').val(result);



		   		});

		 });

					$('#stand_submit_button').click(function (evt){


						   
						                // desabilita o campo 
					 $('#stand_submit_button').prop("disabled", true);
					 $('#hit_submit_button').prop("disabled", true);
					  $('#voltar').prop("disabled", false);

				    // convert para float
				    var playerSum = parseFloat($('#player_sum').val()) || 0;
     				var dealerSum = parseFloat($('#dealer_sum').val()) || 0; 

     				 if(!isNaN(playerSum) && !isNaN(dealerSum)){

     				 	// Checkar Quem Ganhou
     				 	if(playerSum==dealerSum){
							$("#winner").html("Empate");
							
							final="D";
						

						}else if(playerSum>21 && dealerSum<21){

							$("#winner").html("Você passou dos 21 pontos");
							final="D";
						
						}else if(dealerSum>21 && playerSum<21){

							$("#winner").html("O dealer passou dos 21 pontos");
							final="P";

						}else if(playerSum>dealerSum){
							$("#winner").html("Você Venceu Ao Dealer");
							final="P";
						}else{
							$("#winner").html("O dealer venceu");
							final="D";
						}

						// Jogador passou dos 21 pontos, dealer com menos de 21
						// CHECKAR QUEM GANHOU COM DUPLA DE ASES

						$.get('updateBaseDeDadosBlackjack.php?dinheiroApostado='+dinheiroApostado+'&final='+final,function(result){
					 	});


					}
					// Hide Dealer Card Blank
						$('#dealer_cards_blank_0').hide("slow");
						$('#dealer_cards_0').show("slow");
				
				});
			});
 


		</script>
</head>
<body>

<body style="background:white;">

<?php
	//array com todas as cartas
	$cards=array(

		"1_of_clubs","2_of_clubs","3_of_clubs","4_of_clubs","5_of_clubs","6_of_clubs","7_of_clubs","8_of_clubs","9_of_clubs","10_of_clubs","11_of_clubs","12_of_clubs","13_of_clubs",
		
		"1_of_diamonds","2_of_diamonds","3_of_diamonds","4_of_diamonds","5_of_diamonds","6_of_diamonds","7_of_diamonds","8_of_diamonds","9_of_diamonds","10_of_diamonds","11_of_diamonds","12_of_diamonds","13_of_diamonds",
		
		"1_of_hearts","2_of_hearts","3_of_hearts","4_of_hearts","5_of_hearts","6_of_hearts","7_of_hearts","8_of_hearts","9_of_hearts","10_of_hearts","11_of_hearts","12_of_hearts","13_of_hearts",

		"1_of_spades","2_of_spades","3_of_spades","4_of_spades","5_of_spades","6_of_spades","7_of_spades","8_of_spades","9_of_spades","10_of_spades","11_of_spades","12_of_spades","13_of_spades",


		);

// Cartas Do Jogador e do dealer


//$player_cards=("","");
//$dealer_cards=("","");

$player_sum=0;
$dealer_sum=0;

//Draw Cards

	for($x=0;$x<4;$x++){

		// Carta Random Para o jogador

		$rand_keys=array_rand($cards,1);

		//RAND KEYS número da posicao do vetor

		$rand_card=$cards[$rand_keys];

		//remover a carta do array

		unset($cards[$rand_keys]);

		// Tirar carta para o jogador e para o dealer

		if($x==0 OR $x==1){

			$player_cards[$x]="$rand_card";


		}else{

			$dealer_cards[$x-2]="$rand_card";
		
		}

		// checar a soma do jogador e do dealer
		// exemplo 1 de espadas 
		// $number[0]==1
		// $number[1]==of
		// $number[2]== spade

		// SEPARAR O NUMERO DO NOME DA CARTA
		$number=explode("_",$rand_card);

		if($number[0]==1){

			if($x==0 OR $x==1){

				$player_sum=$player_sum+11;

			}else{
				
				$dealer_sum=$dealer_sum+11;
			}
		
		}elseif($number[0]==11 OR $number[0]==12 OR $number[0]==13){

			if($x==0 OR $x==1){

				$player_sum=$player_sum+10;

			}else{

				$dealer_sum=$dealer_sum+10;
			}

		}else{

			if($x==0 OR $x==1){

				$player_sum=$player_sum+$number[0];

			}else{

				$dealer_sum=$dealer_sum+$number[0];
			}

		}
	}
/*
	if(($player_cards[0]=="1_of_clubs" OR $player_cards[0]=="1_of_diamonds" OR $player_cards[0]=="1_of_hearts" OR $player_cards[0]=="1_of_spades")&&
		($player_cards[0]=="1_of_clubs" OR $player_cards[0]=="1_of_diamonds" OR $player_cards[0]=="1_of_hearts" OR $player_cards[0]=="1_of_spades")){
			
			$player_sum=2;
		
		}
		if(($dealer_cards[0]=="1_of_clubs" OR $dealer_cards[0]=="1_of_diamonds" OR $dealer_cards[0]=="1_of_hearts" OR $dealer_cards[0]=="1_of_spades")&&
		($dealer_cards[0]=="1_of_clubs" OR $dealer_cards[0]=="1_of_diamonds" OR $dealer_cards[0]=="1_of_hearts" OR $dealer_cards[0]=="1_of_spades")){
		
			$dealer_sum=2;
		
		}
*/
		
		//TRANSFERIR CARTAS 
		$_SESSION['cards'] = $cards;
		$_SESSION['player_card_a']="$player_cards[0].jpg";
		$_SESSION['player_card_b']="$player_cards[1].jpg";
		$_SESSION['player_card_sum']="$player_sum";

		$_SESSION['dealer_card_a']="$dealer_cards[0].jpg";
		$_SESSION['dealer_card_b']="$dealer_cards[1].jpg";
		$_SESSION['dealer_card_sum']="$dealer_sum";		
		

		// Regras especiais para dupla de azes	

	
		// print cartas dos jogador

		echo "<span><b> Cartas Do Jogador:</b> <br/> <span/>

		<div style=\"float:left;\">
			<img src=\"images/$player_cards[0].jpg\" alt=\"images/$player_cards[0]\" width=\"160\" height=\"232\" />
			<img src=\"images/$player_cards[1].jpg\" alt=\"images/$player_cards[1]\" width=\"160\" height=\"232\" />
		</div>
		
		<div id=\"player_Card_c\" style=\"float:left; padding-left:4px;\"></div>
		<div style=\"clear:both;\"> </div>	
		
		<span>
			<input id=\"hit_submit_button\" type=\"button\" value=\"Hit\"/>
			<input id=\"stand_submit_button\" type=\"button\" value=\"Stand\"/>
		</span>

		<span>	
			<input type=\"text\" name=\"inp_player_sum\" id=\"player_sum\" value=\"$player_sum\" size=\"2\"disabled/>
			<input id=\"voltar\" type=\"button\" onClick=\"history.go(-1)\" value=\"Voltar à página anterior\" disabled/>
		</span>
		";
		// print cartas do dealer inp =soma , dealer_card_c jquery load, no div do style float left é a carta virada e a
		echo "<div style=\"height:30px;\"> </div> <span><b> Cartas Do dealer: </b> <br/> </span/>

		<div style=\"float:left;\">
			<img src=\"images/blank.jpg\" alt=\"images/blank.jpg\" width=\"160\" height=\"232\" id=\"dealer_cards_blank_0\"/>
			<img src=\"images/$dealer_cards[0].jpg\" alt=\"images/$dealer_cards[0]\" width=\"160\" height=\"232\" id=\"dealer_cards_0\" style=\"display:none\" />
			<img src=\"images/$dealer_cards[1].jpg\" alt=\"images/$dealer_cards[1]\" width=\"160\" height=\"232\" />

		
		<div id=\"dealer_card_c\" style=\"float:right; padding-left:4px;\"></div>
		<div style=\"clear:both;\"> </div>	
		
				<div/>
		<span>
			<input type=\"text\" name=\"inp_dealer_sum\" id=\"dealer_sum\" value=\"$dealer_sum\" size=\"2\" /> 
		</span>
		
		";
	
			echo "
			<div style=\"position:absolute;top:35%;right:10%;\">
			<h1 id=\"winner\"></h1>
			</div>
			";

?>

</body>
</html>