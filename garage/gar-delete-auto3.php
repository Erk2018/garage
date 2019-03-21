<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <title>gar-delete-auto3.php</title>
    <link rel="stylesheet" href="style1.css">
</head>
<body>
<h1>Garage: Delete auto - 3</h1>
<p>
    Op kenteken gegevens zoeken uit de
    tabel 'auto' van de database 'garage'
    zodat ze verwijderd kunnen worden.
</p>
<?php
    //gegevens uit het formulier halen
    $autokenteken = $_POST["autokentekenvak"];
    if(isset($_POST["verwijdervak"])) //Kijkt of de checkbox gecheckt is (een waarde heeft) d.m.v. isset. Niet gecheckt = geen waarde
    {
        $verwijderen = $_POST["verwijdervak"]; //Als de checkbox gecheckt is, zet die de verwijderen variabele als de waarde van de post (1)
    }

    //autogegevens verwijderen
    if(isset($verwijderen)) //Checkt nogmaals of $verwijderen set is (1), en verwijdert als dat zo is
    {
        require_once "gar-connect.php";

        $sql = $conn->prepare("
                                delete from auto
                                where   autokenteken = :autokenteken
                                ");
        $sql->execute(["autokenteken" => $autokenteken]);

        echo "De gegevens zijn verwijderd. <br />";
    }
    else
    {
        echo "De gegevens zijn niet verwijderd. <br />"; //Als de post van de checkbox niet 1 is, ook niet verwijderen.
    }

    echo "<a href='gar-menu.php'>Terug naar het menu. </a>";
?>
</body>
</html>