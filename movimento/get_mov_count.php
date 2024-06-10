<?php
header('Content-Type: application/json');
try {
    $conn = new PDO("pgsql:host=localhost;dbname=estacionamento", "postgres", "0511");
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $stmt = $conn->prepare("SELECT COUNT(*) as count FROM movimento");
    $stmt->execute();

    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    $count = $result['count'];

    echo json_encode(['count' => $count]);
} catch (PDOException $e) {
    echo json_encode(['count' => 0, 'error' => $e->getMessage()]);
}
?>
