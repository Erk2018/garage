<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <title>gar-create-klant2.php</title>
    <link rel="stylesheet" href="style1.css">
</head>
<body>
<h1 class="h1tje">Garage: Create klant - 2</h1>
<div class="creatediv">
<p>
    Een klant toevoegen aan de tabel
    'klant' in de database 'garage'.
</p>
<?php
// klantgegevens uit formulier halen
$klantid        = NULL; //komt niet uit het formulier (autoincrement)
$klantnaam      = $_POST["klantnaamvak"];
$klantadres     = $_POST["klantadresvak"];
$klantpostcode  = $_POST["klantpostcodevak"];
$klantplaats    = $_POST["klantplaatsvak"];

// klantgegevens invoeren in tabel
require_once "gar-connect.php";

$sql = $conn->prepare("
insert into klant values 
(
    :klantid, :klantnaam, :klantadres, :klantpostcode, :klantplaats
)
    
");

$sql->execute([
    "klantid"       => $klantid,
    "klantnaam"     => $klantnaam,
    "klantadres"    => $klantadres,
    "klantpostcode" => $klantpostcode,
    "klantplaats"   => $klantplaats
]);

echo "De klant is toegevoegd <br />";
echo "<a href='gar-menu.php'> terug naar het menu </a>";
?>
</div>
</body>
</html>