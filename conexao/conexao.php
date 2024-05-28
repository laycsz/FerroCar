<?php

try{

$conn = new PDO("pgsql:host=localhost;dbname=estacionamento", "postgres", "0511");

    // echo "Conexao efetuada";

} catch(PDOException $e){
    echo $e->getMessage();

}
