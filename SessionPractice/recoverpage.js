$(document).ready(function(){
    
    $.ajax({
        url: 'PassSession.php'
    }).done(function(data){
        if(data == "Invalid Approach!"){
            alert("Invalid Approach!");
            location.href = 'index.php';
        }else{
            
        }
    });
    
    $('#forms').on('submit',function(e){
        e.preventDefault();
        e.stopPropagation();
        
        var getData = $('#forms').serialize();
        $.ajax({
            
            url: 'changepass.php',
            type: 'post',
            data: getData,
            success: function(data,status){
                $('#results').html(data);
                if(data == "Success!"){
                    location.href = 'index.php';
                }else{
                    
                }
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