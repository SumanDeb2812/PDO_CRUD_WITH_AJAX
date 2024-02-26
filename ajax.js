//--------------------------------------load 1st page------------------------------------
function showData(){
    let xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function(){
        if(this.readyState == 4 && this.status == 200){
            document.getElementById('main').innerHTML = this.response;
        }
    }
    xhr.open("GET", "read.php", true);
    xhr.send();
}
window.onload = showData;
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