<?php
include('./db/db_config.php');
try {
    $create_title = $_POST['ct'];
    $create_description = $_POST['cd'];
    $query = $conn->prepare("INSERT INTO todos (todo_title, todo_description) VALUES (:create_title, :create_description)");
    $result = $query->execute([':create_title' => $create_title, ':create_description' => $create_description]);
} catch (PDOException $th) {
    echo $th->getMessage();
}
if($result == true){
    echo 1;
}else{
    echo 0;
}