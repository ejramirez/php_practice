$(document).ready(function(){
    
    $.ajax({
        url: "pullpost.php"
    }).done(function(data){
        $('#results').html(data);
    });
    
    $('#forms').on('submit', function(e){
        e.preventDefault();
        e.stopPropagation();
        $('#loading-image').show();
        
        var getData = $('form').serialize();
        $.ajax({
            url: 'submitpost.php',
            type: 'post',
            data: getData,
            success: function(data, textStatus){
                $("#results").html(data);
                alert("Post Created!");
            },
            complete: function(){
                $('#loading-image').hide();
            },
            error: function(data){
                $("#results").html(data);
                alert("Error");
            }
        });
        
    });
    
    $("#forms").keyup(function(event){
        if(event.keyCode == 13){
            $("submit").click();
        }
    });
    
});