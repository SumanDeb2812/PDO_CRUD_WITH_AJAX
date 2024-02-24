<?php
try {
    $conn = new PDO("mysql:host=localhost;dbname=test", "root", "");
} catch (PDOException $e) {
    echo "Error:" . $e->getMessage();
}
$query = $conn->prepare("SELECT * FROM test_table_1");
$query->execute();
$number_of_result = $query->rowCount();
$results_per_page = 8;
$total_pages = ceil($number_of_result/$results_per_page);
if (!isset ($_GET['page']) ) {  
    $page = 1;  
} else {  
    $page = $_GET['page'];  
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./src/output.css">
    <title>PDO_CRUD_AJAX</title>
</head>
<body class="p-10 h-screen bg-amber-300">
    <div class="bg-white rounded-md px-10 py-4 shadow-[0_5px_5px_rgba(0,0,0,0.5)] mb-10">
        <nav class="flex align-middle justify-between">
            <h2>PCA</h2>
            <div class="flex">
                <label for="" class="mr-4">Search</label>
                <input type="search" class="shadow-[inset_0_0_3px_rgba(0,0,0,0.5)] w-56 rounded outline-none px-1" onkeyup="searchProfile(this.value)">
            </div>
            <button id="addBtn" class="border px-4">Add New</button>
        </nav>
    </div>
    <div id="main"></div>

    <script src="ajax.js"></script>
</body>
</html>