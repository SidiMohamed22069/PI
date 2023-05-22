<?php 
$connect = new mysqli("localhost","root","","pi");
if(!$connect){
    echo "no connection";
}
 ?>
 <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="avss.css">
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script>
        $(document).ready(function(){
            $('.slidebarbtn').click(function(){
                $('.slidebarbtn').toggleClass('active');
                $('.header1').toggleClass('enjoy');
            })
        })
    </script>
    <title>Document</title>
</head>
<body> 

    <header class="header1">
        <ul>
        <?php
        $connect = new mysqli("localhost","root","","pi");
$sql="select * from semestre";
$result=mysqli_query($connect,$sql);
if($result){
   while($row=mysqli_fetch_assoc($result)){
    $id_sem=$row['id'];
   $nom_sem=$row['nom'];
   echo'<li><a href="avs6.php?id_sem='.$id_sem.'">'.$nom_sem.'</a></li>';
   }
}
 
?>
            <li><a href="index.php">retour  <i class="fa-solid fa-rotate-left"></i></a></li>
        </ul>
        <button class="slidebarbtn">
            <div class="hamburger">
            </div>
        </button>
    </header>
    
   <form method="post">
   <div class="container">
            <table width="800" align="center">
            <tr class="entete">
                <td></td>
                <td></td>
                <td></td>
                <td colspan="1" rowspan="2">Total seance prevue</td>
                <td colspan="4">charge(H)/groupe</td>
                <td colspan="2">NB groupes</td>
                <td colspan="4">planification (H)</td>
                <td colspan="4">realisation en (H)</td>
                <td colspan="4">%avencement cette semaine </td>
                <td colspan="3">seences restantes/groupe</td>
                <td rowspan="2">NB seances realise</td>
                <td rowspan="2">NB seances restantes</td>
            </tr>
            <tr class="b">
                <td>codeEM</td>
                <td>Titre</td>
                <td>creditsEM</td>
                <td>CM</td>
                <td>TD</td>
                <td>TP</td>
                <td>Total</td>
                <td>CM</td>
                <td>TD/TP</td>
                <td>CM</td>
                <td>TD</td>
                <td>TP</td>
                <td>Total</td>
                <td>CM</td>
                <td>TD</td>
                <td>TP</td>
                <td>Total</td>
                <td>CM</td>
                <td>TD</td>
                <td>TP</td>
                <td>Total</td>
                <td>CM</td>
                <td>TD</td>
                <td>TP</td>
            </tr>
            
            <?php
$id_sem=$_GET['id_sem'];
$sql='select * from matiere where id_sem='.$id_sem.'';
$result=mysqli_query($connect,$sql);
if($result){
   while($row=mysqli_fetch_assoc($result)){
    @$av_cm=$_POST['av_cm'];
    @$av_td=$_POST['av_td'];
    @$av_tp=$_POST['av_tp'];
    $id_matiere=$row['id'];
   $nom_matiere=$row['nom'];
   $credit=$row['credit'];
   $cm=$row['CM'];
   $td=$row['TD'];
   $tp=$row['TP'];
   $nbgroup_td_tp=$row['nbr_td_tp'];
    $nbgroup_cm=$row['nbr_cm'];
    $input_cm="<input type='number' class='av' step='0.5' min=0 name='av_cm' >";
    $input_td="<input type='number'  class='av' step='0.5'  min=0 name='av_td'>";
    $input_tp="<input type='number' class='av' step='0.5' min=0 name='av_tp' >";
    // $somme=(int)$_POST['av_cm']+(int)$_POST['av_td']+(int)$_POST['av_tp'];
   echo'<tr>
   <td>'.$id_matiere.'</td>
   <td>'.$nom_matiere.'</td>
   <td>'.$credit.'</td>
   <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td>'.$nbgroup_cm.'</td>
    <td>'.$nbgroup_td_tp.'</td>
   <td>'.$cm.'</td>
   <td>'.$td.'</td>
   <td>'.$tp.'</td>
   <td>'.$cm+$td+$tp.'</td>
   <td>'.$input_cm.'</td>
    <td>'.$input_td.'</td>
    <td>'.$input_tp.'</td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
   </tr>';
   }
}
?>

        </table>
    </div>
    <input type="submit" name="button" class="button">

<?php 
if (isset($_POST['button'])){
    $av_cm=$_POST['av_cm'];
    $av_td=$_POST['av_td'];
    $av_tp=$_POST['av_tp'];
    $sql='update realisation set CM='.$av_cm.',TD='.$av_td.',TP='.$av_tp.' where id_matiere='.$id_matiere.' ';
    $resultat=mysqli_query($connect,$sql);
    if(!$resultat){
          die("Error ".mysqli_error($connect));
    }
    }
?>
   </form>
   </body>
</html>