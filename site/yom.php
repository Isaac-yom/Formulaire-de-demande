<?php

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $email=$_POST['email'];
    $password=$_POST['password'];

    $host="localhost";
    $dbemail="root";
    $dbpassword="";
    $dbname="quickbetrecharge";

    $conn=new mysqli($host, $dbemail, $dbpassword, $dbname);

    if($conn->connect_error){
        die("Connection failed: ".$conn->connect_error);
    }

    $query="SELECT * FROM login WHERE email='$email' AND password='$password'";
    $result=$conn->query($query);

    if($result->num_rows == 1){
        header("Location:sit.php?msg=Bienvenu sur la liste des clients.");
        exit();
    }
    else{
        header("Location:error.php");
        exit();
    }

    $conn->close();
}

?>