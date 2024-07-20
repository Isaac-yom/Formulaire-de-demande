<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        body{
            background-color: #1d2830;
        }
        .container{
            margin-top: 150px;
        }

        input{
            max-width: 300px;
            min-width: 300px;
        }
    </style>
</head>
<body>
   <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6 col-md-offset-3" align="center">
                <form action="yom.php" method="POST">
                    <input type="text" name="email" class="form-control" placeholder="Votre email"><br>
                    <input type="password" name="password" class="form-control" placeholder="Votre mot de passe"><br>
                    <input type="submit" value="Login" class="btn btn-success">
                </form>
            </div>
        </div>
   </div> 
</body>
</html>


