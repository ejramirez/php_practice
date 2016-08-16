$(document).ready(function(){
    
    $('#forms').on('submit',function(e){
        e.preventDefault();
        e.stopPropagation();
        
        var getData = $('#forms').serialize();
        $.ajax({
            url: 'recoverpass.php',
            type: 'post',
            data: getData,
            success: function(data, status){
                $('#results').html(data);
            },
            error: function(data){
                $('#results').html(data);
            } 
        });
    });
    
    $("#forms").keyup(function(event){
        if(event.keyCode == 13){
            $("submit").click();
        }
    });
    
});