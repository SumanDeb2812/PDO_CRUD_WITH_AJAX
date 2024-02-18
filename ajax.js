// $(document).ready(function(){
//     $('.data').load('read.php');
// });

// $(document).ready(function(){
    // $.get('read.php', function(data){
    //     $('.data').html(data);
    // });
// });

$(document).ready(function(){
    $.ajax({
        type: "GET",
        url: "read.php",
        success: function(response){
            $('.data').html(response);
        }
    });
});