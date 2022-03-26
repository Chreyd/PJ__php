<?php      require_once('connexion.php') ; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="style.css" />

</head>
<body>
    
    <p><h1><b>liste des voitures</b></h1>

    <?php 
    
        $reqselect="SELECT * FROM paysages";
        $resultat=mysqli_query($connectpj, $reqselect);
        
        $nbr=mysqli_num_rows($resultat);
        echo "<p> Total de voitures : <b>".$nbr."</b></p>";

    ?>
    </p>

    <p><a href="ajouter.php"><img src="img/ajouter.png" width="50px" height="50px" class="sup" /></a></p>
    
    <table width="100%" border="1">

        <tr>
            <th>Immatriculatin</th>
            <th>Marque</th>
            <th>Prix de Location</th>
            <th>Photo</th>
            <th>Supprimer</th>
            <th>Modifier</th>
        </tr>

        <?php 
        
            while($ligne=mysqli_fetch_assoc($resultat))
            {    
                
                
        ?>

            <tr>
            <td><?php echo $ligne['imm']; ?></td>
            <td><?php echo $ligne['marque']; ?></td>
            <td><?php echo $ligne['prix_loc']; ?></td>
            <td><img src='<?php echo $ligne["photo"]; ?>' class="photocar" /></td>
            <td><a href="supprimer.php?supcar=<?php echo $ligne['imm']; ?>"><img src="img/supprime.jpg" width="50px" height="50px" /></a></td>
            <td><a href="modifier.php?mod=<?php echo $ligne['imm']; ?>"><img src="img/modifier.jpg" width="50px" height="50px" /></a></td>

            </tr>
        




        <?php 
            }
        ?>




    </table>





</body>
</html>