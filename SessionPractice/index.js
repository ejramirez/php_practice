$(document).ready(function(){
    
    $('#forms').on('submit', function(e){
        e.preventDefault();
        e.stopPropagation();
        
        var getData = $('#forms').serialize();
        $.ajax({
            url: 'login.php',
            type: 'post',
            data: getData,
            success: function(data, status){
                if(data != "No Result"){
                location.href = 'welcome.php';
                }else{
                    $('#results').html(data);
                }
            },
            error: function(data){
                $('#results').html(data);
            },
            complete: function(){
                //alert('Complete!');
            }
        });
    });
    
    $("#forms").keyup(function(event){
        if(event.keyCode == 13){
            $("submit").click();
        }
    });
    
});