<?php
try {
    $conn = new PDO("mysql:host=localhost;dbname=test", "root", "");
} catch (PDOException $e) {
    echo "Error:" . $e->getMessage();
}
if(!isset($_GET['name'])){
    $name = "";
}else{
    $name = $_GET['name'];
}
$pattern = '%' . $name . '%';
$query = $conn->prepare("SELECT * FROM test_table_1 WHERE name LIKE :pattern");
$query->execute([':pattern' => $pattern]);
$number_of_result = $query->rowCount();
$results_per_page = 8;
$total_pages = ceil($number_of_result/$results_per_page);
if (!isset ($_GET['page']) ) {  
    $page = 1;  
} else {  
    $page = $_GET['page'];  
}
$page_first_result = ($page-1) * $results_per_page;
$query1 = $conn->prepare("SELECT * FROM test_table_1 WHERE name LIKE :pattern LIMIT " . $page_first_result . "," . $results_per_page);
$query1->execute([':pattern' => $pattern]);
$result = $query1->fetchAll(PDO::FETCH_ASSOC);
?>
<div class="p-4 rounded-md shadow-[0_5px_5px_rgba(0,0,0,0.5)] bg-teal-500 mb-10 h-[26rem]">
    <table class="w-full">
        <thead class="text-center">
            <tr class="border-b border-black">
                <th class="py-3">Id</th>
                <th class="py-3">Name</th>
                <th class="py-3">Email</th>
                <th class="py-3">Contact</th>
                <th class="py-3">Edit</th>
                <th class="py-3">Delete</th>
            </tr>
        </thead>
        <tbody class="text-center">
        <?php foreach($result as $row): ?>
            <tr>
                <td class="py-2"><?= $row['id'] ?></td>
                <td class="py-2"><?= $row['name'] ?></td>
                <td class="py-2"><?= $row['email'] ?></td>
                <td class="py-2"><?= $row['contact'] ?></td>
                <td class="py-2"><button  class="bg-blue-900 px-2 rounded text-white transition duration-100 hover:shadow-[0_2px_5px_rgba(0,0,0)]">Edit</button></td>
                <td class="py-2"><button  class="bg-red-900 px-2 rounded text-white transition duration-100 hover:shadow-[0_2px_5px_rgba(0,0,0)]">Delete</button></td>
            </tr>
        <?php endforeach ?>
        </tbody>
    </table>
</div>
<div class="flex w-full justify-center">
<?php 
if($number_of_result > 8):
for($page = 1; $page<= $total_pages; $page++): ?>
    <button class="bg-black text-white px-4 mx-3 rounded hover:shadow-[0_2px_5px_rgba(0,0,0)]" value="<?= $page ?>" onclick="paginate(this.value)"><?= $page ?></a></button>
<?php 
endfor;
endif;
?>
</div>