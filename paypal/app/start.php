<?php

	require 'vendor/autoload.php';

	define('SITE_URL','http://localhost/safebet/paypal');

	$paypal= new \PayPal\Rest\ApiContext(

		new \PayPal\Auth\OAuthTokenCredential(

			'AWFyHE6hB1gVxWqgotcCDU2G2L7E9thdUvUBP7nL-5c91QXZqSSNVhtAMSO6VBJGL0XQcJgkk4nXsG-v',
			'EJi0iKpgOKsqoPFG0lLtYURdQXsqQmnBTFjX-mIHnBj5047U-GmHSIPJ7Xy3vTJcr2zTYeZAYCEFtcaM'
		)

	);


?>


