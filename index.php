<!DOCTYPE html>
<html lang="en" >
<head>
	<meta charset="UTF-8">
	<title>SafeBet - Your roulette online game</title>
	<link rel="shortcut icon" HREF="imagens/SafebetLogo.png">
	<!-- import sylesheets -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
	<link rel="stylesheet" href="css/style.css">
	<script src="http://code.jquery.com/jquery-latest.min.js"></script>

	<!-- end of stylesheets-->
	<!-- import javascript-->

		<!-- end of javascript-->
</head>


<body >
	
	<?php 

	require_once "ligacao_bd.php";
	include("navbar.html");

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
			    $_SESSION["dinheiro"]=$reg->dinheiro;
			    $_SESSION["idUtilizador"]=$reg->idUtilizador;
				endforeach;

				$ola=20;

				$idUtilizador=$_SESSION["idUtilizador"];


				

	 ?>

	 <script>

	 	 var dinheiroApostado=0;
  	var ola=0;
 	 var corApostada="";
  var numCorreto=0;
  var corCorreta;
  // var dinheiro=$.get('pagina.php',{valor: "valores", outrovalor: "valor" });;
 var dinheiro=<?php echo $_SESSION['dinheiro']; ?>;
  var rodando=0;
  var options = [0,1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24,25,26,27,28,29,30,31,32,33,34,35,36];
  var startAngle = 11;
  var arc = Math.PI / (options.length / 2);
  var spinTimeout = null;
  var spinArcStart = 10;
  var spinTime = 0;
  var spinTimeTotal = 0;
  var ctx;
  var dinheiroApostado = document.getElementById('dinheiroApostado');
  var final;

      


function byte2Hex(n) {
  var nybHexString = "0123456789ABCDEF";
  return String(nybHexString.substr((n >> 4) & 0x0F,1)) + nybHexString.substr(n & 0x0F,1);
}

function RGB2Color(r,g,b) {
	return '#' + byte2Hex(r) + byte2Hex(g) + byte2Hex(b);
}

function getColor(item, maxitem) {
  var phase = 0;
  var center = 128;
  var width = 127;
  var frequency = 0;

 if(item==0){
  
  red   = Math.sin(frequency*item+4+phase) * width + center;
  green = Math.sin(frequency*item+0+phase) * width + center;
  blue  = Math.sin(frequency*item+4+phase) * width + center;
  
 return RGB2Color(red,green,blue);

 }if(item%2==0){

  red   = 150;
  green =0;
  blue  =0;
  
 return RGB2Color(red,green,blue);

}else{

  red   = 0
  green = 0
  blue  = 0

 return RGB2Color(red,green,blue);

}

}

function drawRouletteWheel() {
  var canvas = document.getElementById("canvas");
  if (canvas.getContext) {
    var outsideRadius = 200;
    var textRadius = 160;
    var insideRadius = 125;

    ctx = canvas.getContext("2d");
    ctx.clearRect(0,0,500,500);

    ctx.strokeStyle = "green";
    ctx.lineWidth = 10;

    ctx.font = 'bold 12px Helvetica, Arial';

    for(var i = 0; i < options.length; i++) {
      var angle = startAngle + i * arc;
      //ctx.fillStyle = colors[i];
      ctx.fillStyle = getColor(i, options.length);

      ctx.beginPath();
      ctx.arc(250, 250, outsideRadius, angle, angle + arc, false);
      ctx.arc(250, 250, insideRadius, angle + arc, angle, true);
      ctx.stroke();
      ctx.fill();

      ctx.save();
      ctx.shadowOffsetX = -1;
      ctx.shadowOffsetY = -1;
      ctx.shadowBlur    = 0;
      ctx.shadowColor   = "rgb(220,220,220)";
      ctx.fillStyle = "black";
      ctx.translate(250 + Math.cos(angle + arc / 2) * textRadius, 
                    250 + Math.sin(angle + arc / 2) * textRadius);
      ctx.rotate(angle + arc / 2 + Math.PI / 2);
      var text = options[i];
      ctx.fillText(text, -ctx.measureText(text).width / 2, 0);
      ctx.restore();
    } 

    //Arrow
    ctx.fillStyle = "white";
    ctx.beginPath();
    ctx.moveTo(250 - 4, 250 - (outsideRadius + 5));
    ctx.lineTo(250 + 4, 250 - (outsideRadius + 5));
    ctx.lineTo(250 + 4, 250 - (outsideRadius - 5));
    ctx.lineTo(250 + 9, 250 - (outsideRadius - 5));
    ctx.lineTo(250 + 0, 250 - (outsideRadius - 13));
    ctx.lineTo(250 - 9, 250 - (outsideRadius - 5));
    ctx.lineTo(250 - 4, 250 - (outsideRadius - 5));
    ctx.lineTo(250 - 4, 250 - (outsideRadius + 5));
    ctx.fill();
  }
}

function spinVermelho() {

  

  var dinheiroApostado = document.getElementById('dinheiroApostado');

  if(dinheiroApostado.value>dinheiro){

      alert("O dinheiro que você apostou é maior que o seu saldo");

    }else{


     if(dinheiroApostado.value<10){
          alert("A Aposta tem de ser maior do que 10 coins");
      }else{

         if(confirm("Sua Aposta: "+dinheiroApostado.value +" no vermelho, deseja fazer essa aposta?")) {

            corApostada="vermelho";
        //    alert(dinheiroApostado.value+corApostada);
            spinAngleStart = Math.random() * 10 + 10;
            spinTime = 0;
            spinTimeTotal = Math.random() * 3 + 4 * 1000;
            document.getElementById('vermelho').disabled=true; // meter os botoes disabled quando a roleta roda
            document.getElementById('preto').disabled=true;
            document.getElementById('verde').disabled=true;
         
           rotateWheel();
        }
      }
    }
  }

  function spinPreto() {

  
    var dinheiroApostado = document.getElementById('dinheiroApostado');

    if(dinheiroApostado.value>dinheiro){

      alert("O dinheiro que você apostou é maior que o seu saldo");

    }else{

       if(dinheiroApostado.value<10){
            alert("A Aposta tem de ser maior do que 10 coins");
        }else{

           if(confirm("Sua Aposta: "+dinheiroApostado.value +" no preto, deseja fazer essa aposta?")) {

              corApostada="preto";
            //   alert(dinheiroApostado.value+corApostada);
              spinAngleStart = Math.random() * 10 + 10;
              spinTime = 0;
              spinTimeTotal = Math.random() * 3 + 4 * 1000;
              document.getElementById('vermelho').disabled=true; // meter os botoes disabled quando a roleta roda
              document.getElementById('preto').disabled=true;
              document.getElementById('verde').disabled=true;
           
             rotateWheel();
          }
        }
      }
    }
  
    function spinVerde() {

    var dinheiroApostado = document.getElementById('dinheiroApostado');

    if(dinheiroApostado.value>dinheiro){

      alert("O dinheiro que você apostou é maior que o seu saldo");

    }else{

      if(dinheiroApostado.value<10){
          alert("A Aposta tem de ser maior do que 10 coins");
      }else{

         if(confirm("Sua Aposta: "+dinheiroApostado.value +" no verde, deseja fazer essa aposta?")) {

            corApostada="verde";
          //  alert(dinheiroApostado.value+corApostada);
            spinAngleStart = Math.random() * 10 + 10;
            spinTime = 0;
            spinTimeTotal = Math.random() * 3 + 4 * 1000;
            document.getElementById('vermelho').disabled=true; // meter os botoes disabled quando a roleta roda
            document.getElementById('preto').disabled=true;
            document.getElementById('verde').disabled=true;
         
            rotateWheel();
        }
      }
    }
  }


function rotateWheel() {

  rodando=1;

 spinTime +=20; //20
  if(spinTime >= spinTimeTotal) {
    stopRotateWheel();
    return;
  }
  var spinAngle = spinAngleStart - easeOut(spinTime, 0, spinAngleStart, spinTimeTotal);
  startAngle += (spinAngle * Math.PI / 180);
  drawRouletteWheel();
  spinTimeout = setTimeout('rotateWheel()', 30);
}

function stopRotateWheel() {

   var dinheiroApostado = document.getElementById('dinheiroApostado');

  clearTimeout(spinTimeout);
  var degrees = startAngle * 180 / Math.PI + 90;
  var arcd = arc * 180 / Math.PI;
  var index = Math.floor((360 - degrees % 360) / arcd);
  ctx.save();
  ctx.font = 'bold 30px Helvetica, Arial';
  var text = options[index]
  numCorreto=text;

  if(numCorreto%2==0){
      corCorreta="vermelho";
  }else if(numCorreto==0){
      corCorreta="verde";
  }else{
      corCorreta="preto";
  } 

  //alert(corApostada+" "+corCorreta+" "+numCorreto);

   if(corApostada==corCorreta){            // Verificar se a cor apostada é igual
      
   		final="G";

      if(corApostada=="verde"){

        dinheiro=dinheiro-parseInt(dinheiroApostado.value);
        dinheiro=dinheiro+(parseInt(dinheiroApostado.value)*30);  

      }else{

       	dinheiro=dinheiro-parseInt(dinheiroApostado.value);
        dinheiro=dinheiro+(parseInt(dinheiroApostado.value)*2); 
      }

    }else{

    	final="P";
        dinheiro=dinheiro-parseInt(dinheiroApostado.value);
        
    }


	$( document ).ready(function() {
 				//"excluir_email.php?email="+email+"&grupo="+outra;
			$.get('updateBaseDeDados.php?dinheiro='+dinheiro+'&final='+final+'&corApostada='+corApostada+'&dinheiroApostado='+dinheiroApostado.value,function(result){
					 
		});
	});

  ctx.fillText(text, 250 - ctx.measureText(text).width / 2, 250 + 10);
  ctx.restore();
  document.getElementById('vermelho').disabled=false;
  document.getElementById('preto').disabled=false;
  document.getElementById('verde').disabled=false;
  
}

function easeOut(t, b, c, d) {
  var ts = (t/=d)*t;
  var tc = ts*t;
  return b+c*(tc + -3*ts + 3*t);
}

 



	 </script>

	<div class="row">
		<div class="col">
			<canvas id="canvas" width="500" height="500">
				<script> drawRouletteWheel(); </script>
			</canvas>
		</div>

		

		 </script>
		<div class="">
			<form id="formulario">
				<div id="quantidadeApostada">
					Dinheiro A Apostar <br>
					 <input type="number" id="dinheiroApostado" name="dinheiroApostado"> 
				</div>
				<input class="btn btn-danger" type="button" id=vermelho name="Vermelho" value="Vermelho" onclick="spinVermelho()">
					<input class="btn btn-success" type="button" id=verde name="Verde" value="Verde" onclick="spinVerde()">
					<input class="btn btn-dark" type="button"  id=preto name="Preto" value="Preto" onclick="spinPreto()">
	     </form>
		</div>
	</div>
</body>
</html>

<?php

}

?>