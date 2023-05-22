<?php
$connect = new mysqli("localhost","root","","pi");
if(!$connect){
    die("no connection".mysqli_connect_error());}
if(isset($_POST['button'])){
$id=$_POST['id_sem'];
$nom=$_POST['nom_sem'];

$sql="insert into semestre (id,nom) values ('$id','$nom')";
$resultat=mysqli_query($connect,$sql);
if(!$resultat){
    echo"insertion failed";
}
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="s.css">
    <title>Document</title>
</head>
<body> 
    <form  method="post">
        <div class="formulaire">
            <div class="input">
                <input type="number" placeholder="entrer l'id du semestre" name="id_sem" required>
            </div>
            <div class="input">
                <input type="texte" placeholder="entrer le nom du semestre" name="nom_sem" required>
            <div class="submit">
                <button name="button">Ajouter</button>
            </div>
        </div>
    </form>
</body>
</html>