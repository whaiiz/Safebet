<!DOCTYPE html>
<html>
<body bgcolor="blue">

<canvas id="myCanvas" width="300" height="150" style="border:1px solid #d3d3d3;">
Your browser does not support the HTML5 canvas tag.</canvas>

<script>

var c = document.getElementById("myCanvas");
var ctx = c.getContext("2d");

ctx.beginPath();              
ctx.lineWidth = "5";
ctx.strokeStyle = "green";  // Green path
ctx.moveTo(0, 75);
ctx.lineTo(250, 75);
ctx.stroke();  // Draw it

ctx.beginPath();
ctx.strokeStyle = "purple";  // Purple path
ctx.moveTo(50, 0);
ctx.lineTo(150, 130);            
ctx.stroke();  // Draw it

</script>






<script> 
	var options = [0,1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24,25,26,27,28,29,30,31,32,33,34,35,36];
	var startAngle = 11;
	var arc = Math.PI / (options.length / 2);

  // ANIMNACAO

  var spinTime=0;
  var spinTimeTotal=0;
  var spinTimeout=0;

	
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

  // verifica se o canvas existe
  if (canvas.getContext) {

    var outsideRadius = 200;
    var textRadius = 160;
    var insideRadius = 125;

    ctx = canvas.getContext("2d");
    // nada
     ctx.clearRect(0,0,500,500);


    // contorno
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


function spin(){

  spinAngleStart = Math.random() * 10 + 10;
            spinTime = 0;
            spinTimeTotal = Math.random() * 3 + 4 * 1000;
            rotateWheel();



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


function stopRotateWheel(){

   clearTimeout(spinTimeout);
  var degrees = startAngle * 180 / Math.PI + 90;
  var arcd = arc * 180 / Math.PI;
  var index = Math.floor((360 - degrees % 360) / arcd);
  ctx.save();
  ctx.font = 'bold 30px Helvetica, Arial';
  var text = options[index]



}


function easeOut(t, b, c, d) {
  var ts = (t/=d)*t;
  var tc = ts*t;
  return b+c*(tc + -3*ts + 3*t);
}





</script>

</body>

<div class="row">
    <div class="col">

<canvas id="canvas" width="500" height="500">
<script> drawRouletteWheel(); </script> 
</canvas>
</div>


<input type="button"  id="preto" name="Preto" value="Preto" onclick="spin()">


