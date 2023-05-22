<?php 
$connect = new mysqli("localhost","root","","pi");
if(!$connect){
    echo "no connection";
}
 ?>
<html>
    <head>
        <link rel="stylesheet" href="style.css">
    </head>
    <body>
        <ul>
        <?php
$sql="select * from semestre";
$result=mysqli_query($connect,$sql);
if($result){
   while($row=mysqli_fetch_assoc($result)){
    $id=$row['id'];
   $nom=$row['nom'];
   echo'<li><a href="avs6.php?id_sem='.$id.'">'.$nom.'</a></li>';
   }
}

?>
        </ul>
        

    </body>
</html>