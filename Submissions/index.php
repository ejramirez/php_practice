<!DOCTYPE html>
<html>

    <head>
        <script   src="https://code.jquery.com/jquery-3.1.0.min.js"   integrity="sha256-cCueBR6CsyA4/9szpPfrX3s49M9vUU5BgtiJj06wt/s="   crossorigin="anonymous"></script>
        <script src="index.js" type="text/javascript"></script>
    </head>
    
    <body>
        
        <form method="post" id="forms">
            Email: <input type="text" name="email" /> <br>
            Name: <input type="text" name="name" /> <br>
            Title: <input type="text" name="title" /> <br>
            Post: <textarea name="post" form="forms" placeholder="Enter text here..."></textarea> <br>
            <input type="submit" name="Submit" />
        </form>
    
        <div style="display:none;" id="loading-image"><img src="default.gif"/></div>
        <div id="results"></div>
    
    </body>

</html>