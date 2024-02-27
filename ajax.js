//--------------------------------------load 1st page------------------------------------
function loadAlways(){
    $(window).load('read.php', function(response){
        $('#main').html(response);
    });
}
loadAlways();
//--------------------------------------ajax pagination------------------------------------
function paginate(value){
    let xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function(){
        if(this.readyState == 4 && this.status == 200){
            document.getElementById('main').innerHTML = this.response;
        }
    }
    xhr.open("GET", "read.php?page=" + value, true);
    xhr.send();
}
//--------------------------------------ajax search----------------------------------------
function searchProfile(value){
    let xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function(){
        if(this.readyState == 4 && this.status == 200){
            document.getElementById('main').innerHTML = this.response;
        }
    }
    xhr.open("GET", "search.php?name=" + value, true);
    xhr.send();
}
document.getElementById('search').addEventListener('search', function(){
    let xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function(){
        if(this.readyState == 4 && this.status == 200){
            document.getElementById('main').innerHTML = this.response;
        }
    }
    xhr.open("GET", "index.php", true);
    xhr.send();
})
//--------------------------------------ajax delete--------------------------------------------
function openDeleteProfile(value){
    document.getElementById('dynamic-box').style.display = "flex";
    document.getElementById('delete-profile').style.display = "block";
    document.getElementById('delete-profile-btn').value = value;
}

function deleteProfile(value){
    let xhr = new XMLHttpRequest();
    xhr.open("GET", "delete.php?id=" + value, true);
    xhr.send();
}

function cancelDelete(){
    document.getElementById('dynamic-box').style.display = "";
    document.getElementById('delete-profile').style.display = "";
    document.getElementById('delete-profile-btn').value = "";
}
//--------------------------------------ajax update--------------------------------------------
function openEditProfile(value){
    document.getElementById('dynamic-box').style.display = "flex";
    document.getElementById('update-profile').style.display = "block";
    let xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function(){
        if(this.readyState == 4 && this.status == 200){
            let data = JSON.parse(this.responseText);
            document.getElementById('update-form').setAttribute('action', 'action.php?id=' + data[0].id);
            document.getElementById('update-name').value = data[0].name;
            document.getElementById('update-email').value = data[0].email;
            document.getElementById('update-contact').value = data[0].contact;
            document.getElementById('update-btn').value = data[0].id;
        }
    }
    xhr.open("GET", "update.php?id=" + value, true);
    xhr.send();
}
function updateProfile(value){
    let xhr = new XMLHttpRequest();
    xhr.open("GET", "action?id=" + value, true);
    xhr.send();
}

//-------------------------------------------ajax create----------------------------------------
$('#openAdd').click(function(){
    $('#dynamic-box').css('display', 'flex');
    $('#create-todo').show(); 
});
$('#create-btn').click(function(e){
    e.preventDefault();
    let create_title = $('#create-title').val();
    let create_description = $('#create-description').val();

    if(create_title == "" || create_description == ""){
        $('#create-error').show('slide');
    }else{
        $('#create-error').html("");
        $.ajax({
            url: 'create.php',
            type: 'POST',
            data: {ct:create_title, cd:create_description},
            success: function(response){
                if(response == 1){
                    $('#dynamic-box').hide();
                    $('#create-todo').hide();
                    loadAlways();
                }else{
                    alert("Failed to save todo");
                }
            }
        });
    }
});
$('#cancel-create-btn').click(function(){
    $('#dynamic-box').hide();
    $('#create-todo').hide();
    $('#create-form').trigger('reset');
    $('#create-error').hide();
});