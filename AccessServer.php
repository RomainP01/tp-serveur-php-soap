<?php
function getAllRecipes()
{
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "soap-kitchen";

// Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "SELECT id, nomRecette, descriptionRecette FROM recipe";
    return $conn->query($sql)->fetch_all();
}

ini_set('soap.wsdl_cache_enabled', 0);
$serversoap = new SoapServer("http://localhost/tp-serveur-php-soap/server.wsdl");
$serversoap->addFunction("getAllRecipes");
$serversoap->handle();
?>