<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <title>gar-update-auto3.php</title>
    <link rel="stylesheet" href="style1.css">
</head>
<body>
<h1 class="h1tje">Garage update auto 3</h1>
<p>
    Autogegevens wijzigen in de tabel
    'auto' van de database 'garage'.
</p>
<?php
    //autogegevens uit het formulier halen
    $autokenteken   = $_POST["autokentekenvak"];
    $automerk       = $_POST["automerkvak"];
    $autotype       = $_POST["autotypevak"];
    $autokmstand    = $_POST["autokmstandvak"];
    $klantid        = $_POST["klantidvak"];

    //updaten autogegevens ------------------
    require_once "gar-connect.php";

    $sql = $conn->prepare
    ("
        update auto set     automerk    = :automerk,
                            autotype    = :autotype,
                            autokmstand = :autokmstand,
                            klantid     = :klantid
                            where autokenteken = :autokenteken
    ");

    $sql->execute
    ([
        "autokenteken" => $autokenteken,
        "automerk"     => $automerk,
        "autotype"     => $autotype,
        "autokmstand"  => $autokmstand,
        "klantid"      => $klantid
    ]);

    echo "De auto is gewijzigd. <br />";
    echo "<a href='gar-menu.php'> terug naar het menu </a>";
?>
</body>
</html>