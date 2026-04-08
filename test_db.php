<?php
try {
    $pdo = new PDO('mysql:host=localhost;dbname=travelagencysystem', 'root', '');
    echo "Connected successfully to travelagencysystem\n";
    
    $stmt = $pdo->query("SHOW TABLES");
    while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
        echo $row[0] . "\n";
    }

} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
?>
