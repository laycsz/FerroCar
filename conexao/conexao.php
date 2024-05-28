<?php
try {
    $conn = new PDO("pgsql:host=localhost;dbname=estacionamento", "postgres", "0511");
    //echo "Conexao efetuada";
} catch(PDOException $e) {
    echo "Erro com banco de dados: " . $e->getMessage();
}
?>
