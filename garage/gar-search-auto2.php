<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <title>gar-search-auto2.php</title>
    <link rel="stylesheet" href="style1.css">
</head>
<body>
<h1 class="h1tje">Garage: Zoek op kenteken - 2</h1>
<p>
    Op kenteken gegevens zoeken uit de tabel 'auto' van database 'garage'
</p>
<?php
    //kenteken uit het formulier halen
    $autokenteken = $_POST["autokentekenvak"];

    //autogegevens uit de tabel halen
    require_once "gar-connect.php";

    $autos = $conn->prepare("
                                select autokenteken,
                                       automerk,
                                       autotype,
                                       autokmstand,
                                       klantid
                                from   auto
                                where  autokenteken = :autokenteken
                                ");
    $autos->execute(["autokenteken" => $autokenteken]);

    //autogegevens laten zien
    echo "<table>";
    foreach($autos as $auto)
    {
        echo "<tr>";
            echo "<td>" . $auto["autokenteken"]      . "</td>";
            echo "<td>" . $auto["automerk"]    . "</td>";
            echo "<td>" . $auto["autotype"]   . "</td>";
            echo "<td>" . $auto["autokmstand"]. "</td>";
            echo "<td>" . $auto["klantid"]  . "</td>";
            echo "</tr>";
    }
    echo "</table><br />";
    echo "<a href='gar-menu.php'> terug naar het menu </a>";
?>
</body>
</html>