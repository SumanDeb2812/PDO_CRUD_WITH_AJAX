<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./src/output.css">
    <title>PDO_CRUD_AJAX</title>
</head>

<body class="p-10 h-screen bg-amber-300">
    <div class="hidden items-center justify-center h-screen w-screen bg-black bg-opacity-30 absolute top-0 left-0 backdrop-blur" id="delete-profile">
        <div>
            <h2>Are you sure ?</h2>
            <div>
                <button>Cancel</button>
                <button id="delete-profile-btn" value="" onclick="deleteProfile(this.value)">Delete</button>
            </div>
        </div>
    </div>
    <div class="bg-white rounded-md px-10 py-4 shadow-[0_5px_5px_rgba(0,0,0,0.5)] mb-10">
        <nav class="flex items-center justify-between">
            <h2>PCA</h2>
            <div class="flex items-center">
                <label for="" class="mr-4">Search</label>
                <input type="search" class="shadow-[inset_0_0_3px_rgba(0,0,0,0.5)] w-56 rounded outline-none px-1" onkeyup="searchProfile(this.value)">
            </div>
            <button id="addBtn" class="border px-4 py-1 rounded bg-black text-white">Add New</button>
        </nav>
    </div>
    <div id="main"></div>

    <script src="ajax.js"></script>
</body>

</html>