<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link rel="stylesheet" href="ajax/site.css">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <style>
        body{
            background-color: #1d2830;

        }
    </style>

</head>
<body>


    <div class="container mt-5">
        <?php
        if(isset($_GET['msg'])){
            $msg=$_GET['msg'];
            echo'<div class="alert alert-warning alert-dismissible fade show" role="alert">
            '.$msg.'  
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>';
        }
        ?>

        <div class="table-responsive">
        <table class="table table-hover text-center">
            <thead class="table-white">
                <tr>
                    <th scope="col">id</th>
                    <th scope="col">Chambre</th>
                    <th scope="col">Type de chambre</th>
                    <th scope="col">Zone</th>
                    <th scope="col">Prix</th>
                    <th scope="col">Date</th>
                    <th scope="col">Numero</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>

                <?php
                    $servername='localhost';
                    $username='root';
                    $password='';
                    $dbname='quickbetrecharge';

                    $conn=mysqli_connect($servername,$username,$password,$dbname);
            
                    $sql="SELECT * FROM `arbre` WHERE 1";
                    $result=mysqli_query($conn,$sql);
                    while ($row=mysqli_fetch_assoc($result)){
                        ?>
                            <tr>
                                <th><?php echo $row['id'] ?></th>
                                <td><?php echo $row['chambre'] ?></td>
                                <td><?php echo $row['type_chambre'] ?></td>
                                <td><?php echo $row['zone1'] ?></td>
                                <td><?php echo $row['prix'] ?></td>
                                <td><?php echo $row['date'] ?></td>
                                <td><?php echo $row['numero'] ?></td>
                                <td>
                                    <a href="delete.php?id=<?php echo $row['id'] ?>"class="btn btn-danger">Supprimer</a>
                                </td>
                            </tr>
                        <?php    
                    }
    
                ?>
            </tbody>
        </table>
        </div>
    </div>
    


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>
</html>