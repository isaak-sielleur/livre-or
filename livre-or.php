<?php


    $link= mysqli_connect("127.0.0.1", "root", "", "livreor");
    $query= mysqli_query($link, "SELECT commentaire, date, login FROM `commentaires`INNER JOIN `utilisateurs` on commentaires.id_utilisateur = utilisateurs.id  ORDER BY date DESC");
    $resultat= mysqli_fetch_all($query, MYSQLI_ASSOC);

?>

<!DOCTYPE html>
<html>

<head>

    <title>Code en Boite</title>
    <link href="https://fonts.googleapis.com/css2?family=Abril+Fatface&family=Bellota:wght@700&family=Montaga&family=Playfair+Display&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="appearance/connexion.css">
    <link rel="stylesheet" href="appearance/livreor.css">
</head>

<body class="body-livreor">

<?php include('content/header/header.php'); ?>

    <section class="comment">
        <?php foreach($resultat as $commentaires): ?>
        <main>
            <div>
                <h1>Posté par <?=$commentaires['login']?></h1>
                <p>le <?=$commentaires['date']?> :</p>
            </div>
            <p><?=$commentaires['commentaire']?></p>
        </main>
        <?php endforeach; ?>
    </section>
    
</body>

</html>