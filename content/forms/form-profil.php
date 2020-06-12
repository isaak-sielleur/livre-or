<?php

    function chiffre($mdp)
    {
        $mdp="azerty".$mdp."cvbn";
        $mdp=hash('sha256',$mdp);
        return $mdp;
    }

    if(isset($_POST['modif']))
    {
        if(!empty($_POST['pseudo']))
        {

            $link= mysqli_connect("127.0.0.1", "root", "", "livreor");

            $requete="SELECT * FROM utilisateurs WHERE login = '".$_POST['pseudo']."'";
            $query= mysqli_query($link, $requete);
            $resultat= mysqli_fetch_all($query, MYSQLI_ASSOC);


            if(empty($resultat))
            {

                $requete= "UPDATE utilisateurs SET login = '".$_POST['pseudo']."' WHERE id=".$_SESSION['id']." ";
                $query= mysqli_query($link, $requete);
                $_SESSION['login'] = $_POST['pseudo'];
            }
            else
            {
                $err="Ce login est déjà utilisé, veuillez en choisir un autre";
            }    
        }

        if(!empty($_POST['password']))
        {
            $link= mysqli_connect("127.0.0.1", "root", "", "livreor");

            $password=chiffre($_POST['password']);
            $requete= "UPDATE utilisateurs SET password = '".$password."' WHERE id=".$_SESSION['id']." ";
            $query= mysqli_query($link, $requete);
        }
        if(!isset($err))
        {
            header('location: profil.php');
        }
    }
?>

<form action="profil.php" method="post" class="form-profil">

        <h1>Si vous voulez modifier votre profil c'est par ici :</h1>

        <div>
            <label for="name">Votre nouvel identifiant :</label>
            <input type="text" id="name" name="pseudo" value=" <?php if(isset($err)) {echo $err;} else{echo $_SESSION['login'];} ?>"  autocomplete="off">
        </div>

        <div>
            <label for="password">Votre nouveau mot de passe :</label>
            <input type="password" id="password" name="password">
        </div>

        <div>
            <button type="submit" name="modif">Modifier</button>
        </div>

    </form>