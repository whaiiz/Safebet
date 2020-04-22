
<title> Pagamentos Paypal </title>

<link rel="stylesheet" href="../css/paypal.css">
	
<link rel="shortcut icon" HREF="../imagens/SafebetLogo.png">

<script type="text/javascript">
	
</script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.3.0/jquery.min.js"></script>
<script type="text/javascript">  
     $(document).ready(function() {                                       
        $("#product").live("change", function() {
          $("#price").val($(this).find("option:selected").attr("value"));
        })
     });                                     
</script>


<h1> PAGAR COM PAYPAL </h1>       


<form action="checkout.php" method="post" autocomplete="off">

<select id="product" name="product"> 
<option value="">Seleciona quantas coins deseja</option>
<option value="5.99">50 Coins</option>  
<option value="9.99">100 Coins</option> 
<option value="23.99">250 Coins</option> 
<option value="45.99">500 Coins</option> 
<option value="89.99">1000 Coins</option> 
</select>



<input type="text" id="price" name="price" value="" readonly="readonly">

<input type="submit" value="Pagar">

</form>

<p> Voc&ecirc; vai ser levado a p&aacute;gina do paypal para concluir o pagamento.</p>


		</div>
	</body>
</html>

