<?php
require_once('connexion.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>index</title>
    <link rel="stylesheet" href="style.css" />

</head>

<body>

    <div id="entete">
        <a href="login.php" class="login">login</a>
        <video autoplay="autoplay" class="video_entete">
            <source src="img\paysage.mp4" type="video/mp4" />
        </video>
        <p Class="monsite">Views images</p>

        <div id="paysage">
            <form action="" method="post">
                <input type="text" name="motcle" id="motcle" placeholder="Recherche par paysage...">
                <input type="submit" value="Recherche" name="btsubmit" class="btfind">
            </form> 
        </div>
    </div>

    <div id="articles">

        <?php
        if (isset($_POST['btsubmit'])){
            $mc=$_POST['motcle'];
            $reqSelect="SELECT * FROM paysages WHERE marque LIKE '%$mc%'";
        }
        else{
            $reqSelect="SELECT * FROM paysages";
        }
            
        $resultat=mysqli_query($connectpj, $reqSelect);
        $nbr=mysqli_num_rows($resultat);
        echo "<p><b>".$nbr."</b> resultats de la recherche</p>";

        while ($ligne=mysqli_fetch_assoc($resultat))
        {
            

    ?>
        <div id="auto">
            <img src="<?php echo $ligne['photo']; ?>" /><br />
            <?php  echo $ligne['imm']; ?><br />
            <?php  echo $ligne['marque']; ?><br />
            <?php  echo $ligne['prix_loc']; ?>

        </div>

        <?php } ?>
    </div>


</body>

</html>