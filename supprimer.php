<?php      require_once('connexion.php') ; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Suppression</title>
    <link rel="stylesheet" href="style.css" />

<body>
    
    <div id="container">

        <form name="formdelet" class="formulaire">
            <?php 
                if(isset($_GET['supcar']))
                {
                    $sup=$_GET['supcar'];
                    $reqDelete="DELETE FROM paysages WHERE imm='$sup'";
                    $resultat=mysqli_query($connectpj,$reqDelete);
                }
                
                if($resultat)
                {
                    echo "<label style='text-align:center; color:#960406'>La suppression a été correctement éffectuée...
                          </label>";
                }
                else
                {
                    echo "<label style='text-align:center; color:#960406'>la suppression a echouée
                          </label>";
                }

            ?>
        </form>
    </div>

</body>
</html>