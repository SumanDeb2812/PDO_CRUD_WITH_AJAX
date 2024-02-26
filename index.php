<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./src/output.css">
    <title>PDO_CRUD_AJAX</title>
</head>

<body class="p-10 h-screen bg-amber-300">
    <div class="hidden items-center justify-center h-screen w-screen bg-black bg-opacity-10 absolute top-0 left-0 backdrop-blur-sm" id="dynamic-box">
        <div class="hidden p-10 bg-yellow-400 rounded-lg text-center animate-[popup_0.3s_linear]" id="delete-profile">
            <h2>Are you sure ?</h2>
            <div class="mt-6">
                <button class="px-4 py-1 bg-red-500 text-white rounded duration-100 hover:shadow-[0_2px_5px_rgba(0,0,0)] mr-2" onclick="cancelDelete()">Cancel</button>
                <button class="px-4 py-1 bg-blue-500 text-white rounded duration-100 hover:shadow-[0_2px_5px_rgba(0,0,0)]" id="delete-profile-btn" value="" onclick="deleteProfile(this.value)">Delete</button>
            </div>
        </div>
        <div class="hidden p-10 bg-yellow-400 rounded-lg text-center animate-[popup_0.3s_linear]" id="update-profile">
            <form action="" method="post" id="update-form">
                <div>
                    <label for="">Name</label>
                    <input type="text" name="name" id="update-name" value="">
                    <p id="input-error"></p>
                </div>
                <div>
                    <label for="">Email</label>
                    <input type="email" name="email" id="update-email" value="">
                    <p id="input-error"></p>
                </div>
                <div>
                    <label for="">Contact</label>
                    <input type="tel" name="contact" id="update-contact" value="">
                    <p id="input-error"></p>
                </div>
                <button id="update-btn" value="" onclick="updateProfile(this.value)">Update</button>
            </form>
        </div>
    </div>
    <div class="bg-white rounded-md px-10 py-4 shadow-[0_5px_5px_rgba(0,0,0,0.5)] mb-10">
        <nav class="flex items-center justify-between">
            <h2>PCA</h2>
            <div class="flex items-center">
                <label for="" class="mr-4">Search</label>
                <input type="search" class="shadow-[inset_0_0_3px_rgba(0,0,0,0.5)] w-56 rounded outline-none px-1" onkeyup="searchProfile(this.value)" id="search">
            </div>
            <button id="addBtn" class="border px-4 py-1 rounded bg-black text-white">Add New</button>
        </nav>
    </div>
    <div id="main">
        <div class="p-4 rounded-md shadow-[0_5px_5px_rgba(0,0,0,0.5)] bg-green-400 mb-8 h-[26rem]">
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
                <tr id="read-id">
                    <td class="py-2"></td>
                    <td class="py-2"></td>
                    <td class="py-2"></td>
                    <td class="py-2"></td>
                    <td class="py-2"><button class="bg-blue-600 px-2 rounded text-white transition duration-100 hover:shadow-[0_2px_5px_rgba(0,0,0)]" value="" onclick="openEditProfile(this.value)">Edit</button></td>
                    <td class="py-2"><button class="bg-red-600 px-2 rounded text-white transition duration-100 hover:shadow-[0_2px_5px_rgba(0,0,0)]" value="" onclick="openDeleteProfile(this.value)">Delete</button></td>
                </tr>
            </tbody>
        </table>
        </div>
    </div>

    <script src="ajax.js"></script>
</body>

</html>