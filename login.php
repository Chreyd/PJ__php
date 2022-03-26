<?php      require_once('connexion.php') ; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion</title>
    <link rel="stylesheet" href="style.css" />

</head>
<body>
    <div id="container">
        <form action="" class="formulaire" method="post">
        <h1>Connexion</h1>
            <label for="txtlogin"><b>Nom d'utilisateur :</b></label>
            <input type="text"  name="txtlogin" required placeholder="Entrer le nom d'utilisateur" class="zonetext"/>
 
            <label for="txtpw"><b>Mot de passe :</b></label>
            <input type="password"  name="txtpw" required placeholder="Entrer mot de passe" class="zonetext"/>
 
            <input type="submit" name="btlogin" value="LOGIN" class="submit"/>


            <?php 
                if(isset($_POST['btlogin']))
                {
                    $req="SELECT * FROM utilisateurs WHERE login='".$_POST['txtlogin']."' and mot_de_passe='".$_POST['txtpw']."'";
                    if($resultat= mysqli_query($connectpj, $req))
                    {
                        $ligne=mysqli_fetch_assoc($resultat);
                        if($ligne!=0)
                        {
                            session_start();
                            $_SESSION['monLogin']=$_POST['txtlogin'];
                            header("location:accueil.php");
                        }
                        else{
                            echo "<font color='#F0001D'>Login ou mot de passe est invalide</font>";
                        }
                    }
                }          
            ?>
        
        </form>


    </div>
    
</body>
</html>