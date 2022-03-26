<?php      require_once('connexion.php') ; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>accueil</title>
    <link rel="stylesheet" href="style.css" />
    <style>
        .maphoto{
            width:50px; 
            height:50px; 
            border-radius:50%; 
            border: 1px solid;
        }
    </style>

</head>
<body>
    
    <div id="global">
        <div id="profil">
            <?php 
                session_start();
                echo "Bonjour et bienvenue ".$_SESSION['monLogin']."<br/>";

                $req="SELECT * FROM utilisateurs WHERE login='".$_SESSION['monLogin']."'";
                $resultat=mysqli_query($connectpj, $req);
                $ligne=mysqli_fetch_assoc($resultat);
            
            ?>

            <img src="<?php echo $ligne['my_photo'] ?>" class="maphoto"/>
            <br/>
            <a href="deconnecter.php">Deconnexion</a>

        </div>
        <div id="tableaubord">

            <?php 

                include("dashboard.php")
            
            ?>

        </div>
    </div>


</body>
</html>