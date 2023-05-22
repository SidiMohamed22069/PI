
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .submit{
            background-color: green;
            border-radius: 100px;
            border: none;
            color: white;
            padding: 5px 10px;
        }
    </style>
</head>
<body>
<table width="800" align="center">
            <tr class="entete">
                <td>nom</td>
                <td>scences</td>
            </tr>
            <?php
            $id_sem=$_GET['id_sem'];
            $connect = new mysqli("localhost","root","","pi");
            $sql="select nom,id_sem from matiere where id_sem='$id_sem';";
            $result=mysqli_query($connect,$sql);
            if($result){
                while($row=mysqli_fetch_assoc($result)){
                    $id_sem=$row['id_sem'];
                    $nom=$row['nom'];
                echo '<tr>
                <td>'.$nom.'</td>
                <td><input type="number" placeholder="avancement en (h)" name="valeur"></td>
                </tr>';
                }
                }
?>
<tr>
    <td colspan="2" align="center">
        <button>ok</button>
    </td>
</tr>
        </table>
</body>
</html>