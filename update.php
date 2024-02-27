<?php
include('./db/db_config.php');
$id = $_POST['id'];
$query = $conn->prepare("SELECT * FROM todos WHERE todo_id = :id");
$query->execute([':id' => $id]);
$result = $query->fetchAll(PDO::FETCH_ASSOC);
?>
<button id="cancel-update-btn" class="bg-red-600 px-3 py-1 rounded-full text-white shadow-[0_0_5px_rgba(0,0,0)] cursor-pointer absolute -right-1 -top-1">X</button> 
<h2>Update Todo</h2>
<?php foreach($result as $row): ?>
<form id="create-form" class="w-[500px] mt-6">
    <div class="flex justify-between items-start mb-4">
        <label for="">Title</label>
        <input type="text" id="update-title" class="w-[300px] outline-none rounded p-1" value="<?= $row['todo_title'] ?>">
    </div>
    <div class="flex justify-between items-start">
        <label for="">Description</label>
        <textarea id="update-description" rows="5" class="w-[300px] outline-none rounded p-1"><?= $row['todo_description'] ?></textarea>
    </div>
    <div class="flex justify-end items-start mt-4">
        <input type="submit" value="Update" id="update-btn" class="bg-blue-600 px-2 rounded text-white transition duration-100 hover:shadow-[0_2px_5px_rgba(0,0,0)]" data-todo-id="<?= $row['todo_id'] ?>">
    </div>
    <div id="update-error" class="hidden bg-red-500 text-white p-2 mt-4 rounded">Above fields are required</div>
</form>
<?php endforeach ?>