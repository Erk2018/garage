<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <title>gar-read-autoeigenaar.php</title>
    <link rel="stylesheet" href="style1.css">
</head>
<body>
<h1 class="h1tje">Garage: Read auto's en eigenaren</h1>
<p>
    Een lijst van alle auto's met hun eigenaren.
</p>
<?php
// tabel uitlezen en netjes afdrukken -----------------
require_once "gar-connect.php";

$autos = $conn->prepare("
                                select autokenteken,
                                       automerk,
                                       autotype,
                                       auto.klantid,
                                       klant.klantid,
                                       klantnaam
                                from   auto, klant
                                where klant.klantid = auto.klantid
                                ");
$autos->execute();

echo "<table>";
foreach($autos as $auto)
{
    echo "<tr>";
    echo "<td>" . $auto["autokenteken"]  . " ---" . "</td>";
    echo "<td>" . $auto["automerk"]               . "</td>";
    echo "<td>" . $auto["autotype"]      . " ---" . "</td>";
    echo "<td>" . $auto["klantid"]       . " ---" . "</td>";
    echo "<td>" . $auto["klantnaam"]              . "</td>";
}
    echo "</tr>";
echo "</table>";
echo "<a href='gar-menu.php'> terug naar het menu </a>";

?>
</body>
</html>