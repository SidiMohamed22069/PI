<?php 
$connect = new mysqli("localhost","root","","pi");
if(!$connect){
    die("no connection".mysqli_connect_error());}
if(isset($_POST['button'])){
    $id_sem=$_POST['id_sem'];
   header('location:r1.php?id_sem='.$id_sem.'');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="s.css">
    <title>Document</title>
</head>
<body> 
    <form method="post">
        <div class="formulaire">
            <div class="input">
            <select name="id_sem">
                <?php
            $connect = new mysqli("localhost","root","","pi");
            $sql="select nom,id from semestre;";
            $result=mysqli_query($connect,$sql);
            if($result){
                while($row=mysqli_fetch_assoc($result)){
                    $id_sem=$row['id'];
                    $nom=$row['nom'];
                echo '
                <option value='.$id_sem.'>'.$nom.'</option>';
                }
                }
?>
                </select>
            </div>
                <button name="button">lancer</button></a>
            </div>
        </div>
    </form>
</body>
</html>