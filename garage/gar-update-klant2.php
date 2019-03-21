<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <title>gar-update-klant2.php</title>
    <link rel="stylesheet" href="style1.css">
</head>
<body>
<h1 class="h1tje">Garage: Update klant - 2</h1>
<p>
    Dit formulier wordt gebruikt om klantgegevens te wijzigen
    in de tabel 'klant' van de database 'garage'.
</p>
<?php
    //klantid uit het formulier halen--------------
    $klantid = $_POST["klantidvak"];

    //klantgegevens uit de tabel halen-------------
    require_once "gar-connect.php";

    $klanten = $conn->prepare("
                                    select klantid,
                                           klantnaam,
                                           klantadres,
                                           klantpostcode,
                                           klantplaats
                                    from   klant
                                    where klantid = :klantid
                                    ");
$klanten->execute(["klantid" => $klantid]);

    //klantgegevens in een nieuw form laten zien ------------
    echo "<form action='gar-update-klant3.php' method='post'>";

        foreach ($klanten as $klant) {

            //klantid mag niet gewijzigd worden
            echo " klantid:" . $klant["klantid"];
            echo " <input type='hidden' name='klantidvak' ";
            echo " value=' " . $klant["klantid"] . " '> <br /> ";

            echo "klantnaam: <input type='text' ";
            echo " name = 'klantnaamvak' ";
            echo " value = '" . $klant["klantnaam"] . "' ";
            echo " > <br />";

            echo "klantadres: <input type='text' ";
            echo " name = 'klantadresvak' ";
            echo " value = '" . $klant["klantadres"] . "' ";
            echo " > <br />";

            echo " klantpostcode: <input type='text' ";
            echo " name = 'klantpostcodevak' ";
            echo "value = '" . $klant["klantpostcode"] . "' ";
            echo " > <br />";

            echo " klantplaats: <input type='text' ";
            echo " name = 'klantplaatsvak' ";
            echo " value = '" . $klant["klantplaats"] . "' ";
            echo " > <br />";


            echo "<input type='submit'>";
            echo "</form>";
        }

        if ($klant["klantid"] != $klantid)
        {
            echo "KlantID niet gevonden.</br>";
            echo "<a href='gar-menu.php'> terug naar het menu </a>";
        }

            //eigenlijk nog controleren op bestaand klantid
?>
</body>
</html>