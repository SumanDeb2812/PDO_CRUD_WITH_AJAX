<?php
include('./db/db_config.php');
$query = $conn->prepare("SELECT * FROM todos");
$query->execute();
$number_of_result = $query->rowCount();
$results_per_page = 8;
$total_pages = ceil($number_of_result / $results_per_page);
if (!isset($_GET['page'])) {
    $page = 1;
} else {
    $page = $_GET['page'];
}
$page_first_result = ($page - 1) * $results_per_page;
$query1 = $conn->prepare("SELECT * FROM todos ORDER BY todo_id DESC LIMIT " . $page_first_result . "," . $results_per_page);
$query1->execute();
$result = $query1->fetchAll(PDO::FETCH_ASSOC);
?>
<div class="p-4 rounded-md shadow-[0_5px_5px_rgba(0,0,0,0.5)] bg-green-400 mb-8 h-[26rem]">
    <table class="w-full">
        <thead class="text-center">
            <tr class="border-b border-black">
                <th class="py-3">Id</th>
                <th class="py-3">Title</th>
                <th class="py-3">Description</th>
                <th class="py-3">Date and Time</th>
                <th class="py-3">Status</th>
                <th class="py-3">Edit</th>
                <th class="py-3">Delete</th>
            </tr>
        </thead>
        <tbody class="text-center">
            <?php foreach ($result as $row) : ?>
                <tr>
                    <td class="py-2"><?= $row['todo_id'] ?></td>
                    <td class="py-2"><?= $row['todo_title'] ?></td>
                    <td class="py-2"><?= $row['todo_description'] ?></td>
                    <td class="py-2"><?= date('d-M-Y', strtotime($row['todo_date'])) ?></td>
                    <td class="py-2"><?= $row['todo_status'] ?></td>
                    <td class="py-2"><button id="update-todo" class="bg-blue-600 px-2 rounded text-white transition duration-100 hover:shadow-[0_2px_5px_rgba(0,0,0)]" data-todo-id="<?= $row['todo_id'] ?>">Edit</button></td>
                    <td class="py-2"><button id="delete-todo" class="bg-red-600 px-2 rounded text-white transition duration-100 hover:shadow-[0_2px_5px_rgba(0,0,0)]" data-todo-id="<?= $row['todo_id'] ?>">Delete</button></td>
                </tr>
            <?php endforeach ?>
        </tbody>
    </table>
</div>
<div class="flex w-full justify-center items-center">
    <?php
    if ($number_of_result > 8) :
        for ($page = 1; $page <= $total_pages; $page++) : ?>
            <button class="bg-black text-white px-4 mx-3 rounded hover:shadow-[0_2px_5px_rgba(0,0,0)]" value="<?= $page ?>" onclick="paginate(this.value)"><?= $page ?></a></button>
    <?php
        endfor;
    endif;
    ?>
</div>