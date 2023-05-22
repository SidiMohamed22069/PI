<?php

$connect = new mysqli("localhost","root","","pi");
if(!$connect){
    die("no connection".mysqli_connect_error());
}

if(isset($_POST['button'])){
$id=$_POST['id_matiere'];
$nom=$_POST['nom_matiere'];
$credit=$_POST['credit_matiere'];
$cm=$_POST['cm_matiere'];
$td=$_POST['td_matiere'];
$tp=$_POST['tp_matiere'];
$id_sem=$_POST['id_sem'];
$nbgroup_td_tp=$_POST['nbgroup_td_tp'];
$nbgroup_cm=$_POST['nbgroup_cm'];
$sql="insert into matiere (id,nom,credit,CM,TD,TP,id_sem,nbr_td_tp,nbr_cm) values ('$id','$nom','$credit','$cm','$td','$tp','$id_sem','$nbgroup_td_tp','$nbgroup_cm')";
$resultat=mysqli_query($connect,$sql);
$err="";
if(!$resultat){
      $err="error";
}
else{

    header("location:avs1.php");
}
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="ss.css">
    <title>Document</title>
</head>
<body> 
    <form method="post">
        <div class="formulaire">
            <div class="input">
                <div class="error">
                <?php 
                if(isset($err)){
                    echo '<p class = "error"> '.$err. '<?p>';
                }
                ?>
                </div>
                <input type="text" placeholder="entrer le code de matiere" name="id_matiere" required>
            </div>
            <div class="input">
                <input type="text" placeholder="entrer le nom du matiere"name="nom_matiere" required>
            </div>
            <div class="input">
                <input type="number" placeholder="entrer le credit de matiere"name="credit_matiere" required>
            </div><div class="input">
                <input type="number" placeholder="entrer le nombre du CM" name="cm_matiere"required>
            </div><div class="input">
                <input type="number" placeholder="entrer le nombre du TD" name="td_matiere"required>
            </div><div class="input">
                <input type="number" placeholder="entrer le nombre du TP" name="tp_matiere" required>
            </div>
            <div class="input">
                <input type="number" placeholder="entrer le nombre du groupe par CM" name="nbgroup_cm" required>
            </div>
            <div class="input">
                <input type="number" placeholder="entrer le nombre du groupe par TD/TP" name="nbgroup_td_tp" required>
            </div>
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
            <div class="submit">
                <button name="button">Ajouter</button>
            </div>
        </div>
    </form>
</body>
</html>