<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <title>gar-delete-auto2.php</title>
    <link rel="stylesheet" href="style1.css">
</head>
<body>
<h1>Garage: Delete auto - 2</h1>
<p>
    Op kenteken gegevens zoeken uit de tabel 'auto'
    van de database 'garage' zodat ze
    verwijderd kunnen worden.
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
            echo "<td>" . $auto["autokenteken"] . "</td>";
            echo "<td>" . $auto["automerk"]     . "</td>";
            echo "<td>" . $auto["autotype"]     . "</td>";
            echo "<td>" . $auto["autokmstand"]  . "</td>";
            echo "<td>" . $auto["klantid"]      . "</td>";
            echo "</tr>";
    }
    echo "<table><br />";

    echo "<form action='gar-delete-auto3.php' method='post'>";
    //kenteken mag niet meer gewijzigd worden
        echo "<input type='hidden' name='autokentekenvak' value=$autokenteken>";
        echo "<input type='checkbox' name='verwijdervak' value='1'>";
        echo "Verwijder deze auto. <br />";
        echo "<input type='submit'>";
        echo "</form>";
?>
</body>
</html>