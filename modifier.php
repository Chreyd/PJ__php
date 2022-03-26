
<?php      require_once('connexion.php') ; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier</title>
    <link rel="stylesheet" href="style.css" />

</head>
<body>
    
    <div id="container">
        <form name="formUpdate" method="post" class="formulaire" enctype="multipart/form-data">

            <h2 align="center">Mettre à Jour une voiture...</h2>

            <label><b>Immatriculation :</b></label>
            <input type="text" name="txtImm" class="zonetext" value="<?php echo $_GET['mod'] ?>" readonly/>

            <label><b>Marque :</b></label>
            <input type="text" name="txtMarque" class="zonetext" placeholder="Entrer la marque ici..." required/>

            <label><b>Prix de location :</b></label>
            <input type="number" name="txtPl" class="zonetext" placeholder="Entrer le prix unitaire..." Required/>

            <label><b>Photo :</b></label>
            <input type="file" name="txtphoto"  name="Choisir une image..." Required/>


            <input type="submit" class="submit" name="btmod" value="Mettre à Jour"/>

            <p><a href="accueil.php" class="submit">Tableau de Bord</a></p>

            <label style="text-align:center; color:#360001;">
               
               <?php 
                
                    if(isset($_POST['btmod']))
                    {
                        $imm=$_POST['txtImm'];
                        $marque=$_POST['txtMarque'];
                        $prixloc=$_POST['txtPl'];

                        $modifier=$_GET['mod'];

                        $image=$_FILES['txtphoto']['tmp_name'];

                        $traget="img/".$_FILES['txtphoto']['name'];

                        move_uploaded_file($image, $traget);

                        $reqUp="UPDATE paysages SET marque='$marque', prix_loc='$prixloc', photo='$traget' WHERE imm='$modifier' ";

                        $resultat=mysqli_query($connectpj, $reqUp);

                        if($resultat)
                        {
                            echo "Mise à Jour des données validée";
                        }
                        else{
                            echo "Echec de modification des données";
                        }
                    }
                
               ?>

            </label>

        </form>


    </div>




</body>
</html>