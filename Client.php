<?php
ini_set('soap.wsdl_cache_enabled', 0);
$service = new SoapClient("http://localhost/tp-serveur-php-soap/server.wsdl");
$allRecipes = $service->getAllRecipes();

var_dump($allRecipes);
?>
