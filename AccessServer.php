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

//function that add recipe to the database
function addRecipe($elements)
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

    $sql = "INSERT INTO recipe (nomRecette, descriptionRecette)
    VALUES ('$elements[0]', '$elements[1]')";

    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

ini_set('soap.wsdl_cache_enabled', 0);
$serversoap = new SoapServer("http://localhost/tp-serveur-php-soap/server.wsdl");
$serversoap->addFunction("getAllRecipes");
$serversoap->addFunction("addRecipe");
$serversoap->handle();
?>