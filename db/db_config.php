<?php
try {
    $conn = new PDO("mysql:host=localhost;dbname=todo_app", "root", "");
} catch (PDOException $e) {
    echo "Error:" . $e->getMessage();
}