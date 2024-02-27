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
$(document).on('click', '#delete-todo', function(){
    $('#dynamic-box').css('display', 'flex');
    $('#delete-todo').show();
    $('#delete-todo-btn').data('todo-id', $(this).data('todo-id'));
});
$('#delete-todo-btn').click(function(){
    $.ajax({
        url: 'delete.php',
        type: 'POST',
        data: {id : $(this).data('todo-id')},
        success: function(response){
            $('#dynamic-box').fadeOut('slow');
            $('#delete-todo').fadeOut('slow');
            loadAlways();
        }
    });
});
$('#cancel-delete').click(function(){
    $('#dynamic-box').fadeOut('slow');
    $('#delete-todo').fadeOut('slow');
})
//--------------------------------------ajax update--------------------------------------------
$(document).on('click', '#update-todo', function(){
    $('#dynamic-box').css('display', 'flex');
    $('#update-todo-box').show();
    $.ajax({
        url: 'update.php',
        type: 'POST',
        data: {id : $(this).data('todo-id')},
        success: function(response){
            $('#update-todo-box').html(response);
        }
    })
});
$(document).on('click', '#update-btn', function(e){
    e.preventDefault();
    let update_title = $('#update-title').val();
    let update_description = $('#update-description').val();
    let todo_id = $(this).data('todo-id');
    if(update_title == "" || update_description == ""){
        $('#update-error').fadeIn();
    }else{
        $('#update-error').hide();
        $.ajax({
            url: 'update-form.php',
            type: 'POST',
            data: {ct:update_title, cd:update_description, id:todo_id},
            success: function(response){
                if(response == 1){
                    $('#dynamic-box').fadeOut();
                    $('#update-todo-box').fadeOut();
                    loadAlways();
                }else{
                    alert("Failed to save todo");
                }
            }
        });
    }
});
$(document).on('click', '#cancel-update-btn', function(){
    $('#dynamic-box').fadeOut();
    $('#update-todo-box').fadeOut();
    $('#update-error').hide();
});
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
    $('#create-form').trigger('reset');
});
$('#cancel-create-btn').click(function(){
    $('#dynamic-box').hide();
    $('#create-todo').hide();
    $('#create-form').trigger('reset');
    $('#create-error').hide();
});