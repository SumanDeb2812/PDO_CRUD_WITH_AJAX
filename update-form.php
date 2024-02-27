<?php
include('./db/db_config.php');
try {
    $id = $_POST['id'];
    $update_title = $_POST['ct'];
    $update_description = $_POST['cd'];
    $query = $conn->prepare("UPDATE todos SET todo_title = :update_title, todo_description = :update_description WHERE todo_id = :id");
    $result = $query->execute([':update_title' => $update_title, ':update_description' => $update_description, ':id' => $id]);
} catch (PDOException $th) {
    echo $th->getMessage();
}
if($result == true){
    echo 1;
}else{
    echo 0;
}