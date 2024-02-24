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
//--------------------------------------ajax delete--------------------------------------------
function openDeleteProfile(value){
    document.getElementById('delete-profile').style.display = "flex";
    document.getElementById('delete-profile-btn').value = value;
}

function deleteProfile(value){
    let xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function(){
        if(this.readyState == 4 && this.status == 200){
            window.location.pathname = 'php_practice/PHP_Projects/PDO_CRUD_WITH_AJAX/';
        }
    }
    xhr.open("GET", "delete.php?id=" + value, true);
    xhr.send();
}
//--------------------------------------