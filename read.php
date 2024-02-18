<?php
try {
    $conn = new PDO("mysql:host=localhost;dbname=test", "root", "");
    $query = $conn->prepare("SELECT * FROM test_table_1");
    $query->execute();
    $result = $query->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    echo "Error:" . $e->getMessage();
}
?>
<table>
    <thead>
        <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Contact</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($result as $row): ?>
            <tr>
                <td><?= $row['name']; ?></td>
                <td><?= $row['email']; ?></td>
                <td><?= $row['contact']; ?></td>
                <td><button>Edit</button></td>
                <td><button>Delete</button></td>
            </tr>
        <?php endforeach ?>
    </tbody>
</table>