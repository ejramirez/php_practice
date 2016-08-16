$(document).ready(function(){
    
    $.ajax({
        url: "session.php"
    }).done(function(data){
        $('#results').html(data);
    });
    
    $('#logout').on('click',function(){
        
        $.ajax({
            url: 'logout.php',
            success: function(data,status){
                location.href = 'index.php';
            },
            error: function(data){
                $('#results').html(data);
            }
        });
        
    });
    
});