<?php
include('./db/db_config.php');
$id = $_POST['id'];
$query = $conn->prepare("DELETE FROM todos WHERE todo_id = :id");
$query->execute([':id' => $id]);
