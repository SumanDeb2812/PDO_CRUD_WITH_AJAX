<?php
$id = $_GET['id'];
try {
    $conn = new PDO("mysql:host=localhost;dbname=test", "root", "");
} catch (PDOException $e) {
    echo "Error:" . $e->getMessage();
}
$query = $conn->prepare("DELETE FROM test_table_1 WHERE id = :id");
$query->execute([':id' => $id]);
?>
