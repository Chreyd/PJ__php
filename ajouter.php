<?php      require_once('connexion.php') ; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ajouter</title>
    <link rel="stylesheet" href="style.css" />

</head>
</head>
<body>

    <div id="container">
        <form name="formAdd" action="" method="post" class="formulaire" enctype="multipart/form-data">
            <h2 align="center">Ajouter une nouvelle voiture...</h2>

            <label><b>Immatriculation :</b></label>
            <input type="text" name="txtImm" class="zonetext" placeholder="Entre l'Immatriculation" required/>

            <label><b>Marque :</b></label>
            <input type="text" name="txtMarque" class="zonetext" placeholder="Entre la Marque" required/>

            <label><b>Prix de Location :</b></label>
            <input type="number" name="txtPl" class="zonetext" placeholder="Entre le Prix Unitaire" required/>
            
            <label><b>Photo :</b></label>
            <input type="file" name="txtphoto" class="zonetext" placeholder="Choisir une image" required/>

            <input type="submit" name="btadd" value="Ajouter" class="submit"/>

            <p><a href="accueil.php" class="submit">Tableau de Bord</a></p>

            <label style="text-align:center; color:#960406">

                <?php 
                    if(isset($_POST['btadd']))
                    {
                        $imm=$_POST['txtImm'];
                        $marque=$_POST['txtMarque'];
                        $prix_loc=$_POST['txtPl'];
                        
                        $image=$_FILES['txtphoto']['tmp_name'];

                        $traget="img/".$_FILES['txtphoto']['name'];

                        move_uploaded_file($image, $traget);
                        $reqAdd="INSERT INTO paysages
                        (imm,marque,prix_loc, photo) 
                        VALUES 
                        ('$imm','$marque','$prix_loc','$traget')";

                        $resultat=mysqli_query($connectpj, $reqAdd);

                        if($resultat){
                            echo "Insertion des données validées";
                        }
                        else{
                            echo "Echec d'insertion des données";
                        }
                    }
                
                
                ?>
        
            </labeL>

        </form>


    </div>
    
</body>
</html>