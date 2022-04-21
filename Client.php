<?php
ini_set('soap.wsdl_cache_enabled', 0);
$service = new SoapClient("http://localhost/tp-serveur-php-soap/server.wsdl");
$allRecipes = $service->getAllRecipes();
$deleteRecipe = $service->deleteRecipe(5);
$addRecipe = $service->addRecipe(["welsh", "Un bon frometon sur son crouton", 'un pain et du fromage']);
$modifyRecipe = $service->modifyRecipe([1,"un pain et du fromage tartinée à la moutarde"]);
var_dump($allRecipes);
?>
