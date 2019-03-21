<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <title>gar-search-autotype2.php</title>
    <link rel="stylesheet" href="style1.css">
</head>
<body>
<h1 class="h1tje">Garage: Zoek op Autotype - 2</h1>
<p>
    Op autotype gegevens zoeken uit de tabel 'auto' van database 'garage'
</p>
<?php
//autotype uit het formulier halen
$autotype = $_POST["autotypevak"];

//autogegevens uit de tabel halen
require_once "gar-connect.php";

$autos = $conn->prepare("
                                select autokenteken,
                                       automerk,
                                       autotype,
                                       autokmstand,
                                       auto.klantid,
                                       klant.klantid,
                                       klantnaam,
                                       klantadres,
                                       klantpostcode,
                                       klantplaats
                                from   auto, klant
                                where  autotype = :autotype and auto.klantid = klant.klantid
                                ");
$autos->execute(["autotype" => $autotype]);

//autogegevens laten zien
echo "<table>";
foreach($autos as $auto)
{
    echo "<tr>";
    echo "<td>" . $auto["autokenteken"]      . "</td>";
    echo "<td>" . $auto["automerk"]    . "</td>";
    echo "<td>" . $auto["autotype"]  . " ---" . "</td>";
    echo "<td>" . $auto["autokmstand"]. " ---" . "</td>";
    echo "<td>" . $auto["klantid"]  . " ---" . "</td>";
    echo "<td>" . $auto["klantnaam"] . " ---" . "</td>";
    echo "<td>" . $auto["klantadres"] . " ---" . "</td>";
    echo "<td>" . $auto["klantpostcode"] . " ---" . "</td>";
    echo "<td>" . $auto["klantplaats"] . "</td>";
    echo "</tr>";
}
echo "</table><br />";
echo "<a href='gar-menu.php'> terug naar het menu </a>";
?>
</body>
</html>