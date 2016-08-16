<!DOCTYPE html>
<html>

    <head>
    
    <script   src="https://code.jquery.com/jquery-3.1.0.min.js"   integrity="sha256-cCueBR6CsyA4/9szpPfrX3s49M9vUU5BgtiJj06wt/s="   crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    <script src="index.js" type="text/javascript"></script>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link href="index.css" type="text/css" rel="stylesheet">
        
    </head>
    
    <body>
    
        <div class="container col-md-4">
            <div id="login" class="col-md-8">
                <form method="post" id="forms">
                    <h3>Username:</h3> <input id="input" class="form-control" type="text" name="username" placeholder="Username" />
                    <h3>Password:</h3> <input id="input" class="form-control" type="password" name="password" placeholder="Password" />
                    <input id="input" class="btn btn-lg" type="submit" name="Submit" />
                </form>
                <a style="color: black;" href="createaccount.php"><button class="btn btn-lg">Create Account</button></a><br><br>
                <a style="color: black;" href="forgotpass.php"><button class="btn btn-lg">Forgot Password?</button></a>
                
                
                <div id="results"></div>
            </div>
        </div>
    
    </body>

</html>