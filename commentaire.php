<!DOCTYPE html>
<html>

<head>
    <link href="https://fonts.googleapis.com/css2?family=Abril+Fatface&family=Bellota:wght@700&family=Montaga&family=Playfair+Display&display=swap" rel="stylesheet">
    <meta charset="UTF-8">
    <title>Livre d'or</title>
    <link rel="stylesheet" href="appearance/livreor.css">
</head>

<body class="body-comment" >
    <?php include('content/header/header.php'); ?>

    <?php

    if(isset($_POST['send']))
    {
        if (!empty($_POST['user_message'])) 
        {
            $_POST['user_message']=addslashes($_POST['user_message']);
            $link= mysqli_connect("127.0.0.1", "root", "", "livreor");
            $requete="INSERT INTO `commentaires` (`id`, `commentaire`, `id_utilisateur`, `date`) VALUES (NULL, '".$_POST['user_message']."', '".$_SESSION['id']."', NOW())";
            mysqli_query($link, $requete);
            header('location: livre-or.php');
        }
    }


?>

    <?php include('content/forms/form-commentaires.php'); ?>
</body>

</html>