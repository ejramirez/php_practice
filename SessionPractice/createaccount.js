$(document).ready(function(){
    
    $('#forms').on('submit', function(e){
        e.preventDefault();
        e.stopPropagation();
        
        var getData = $('#forms').serialize();
        $.ajax({
            url: 'adduser.php',
            type: 'post',
            data: getData,
            success: function(data,status){
                $('#results').html(data);
                if(data != "Password Fields do not match."){
                    alert("Account Created!");
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