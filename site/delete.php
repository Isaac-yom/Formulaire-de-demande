<?php 

$servername='localhost';
$username='root';
$password='';
$dbname='quickbetrecharge';

$conn=mysqli_connect($servername,$username,$password,$dbname);

$id=$_GET['id'];
$sql="DELETE  FROM `arbre` WHERE id=$id";
$result=mysqli_query($conn,$sql);
if($result){
    header("Location:sit.php?msg=Vos informations ont été bien supprimées");
}

?>