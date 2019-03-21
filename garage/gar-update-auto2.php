<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <title>gar-update-auto2.php</title>
    <link rel="stylesheet" href="style1.css">
</head>
<body>
<h1 class="h1tje">Garage: Update auto - 2</h1>
<p>
    Dit formulier wordt gebruikt om autogegevens te wijzigen
    in de tabel 'auto' van de database 'garage'.
</p>
<?php
    //kenteken uit het formulier halen--------------
    $autokenteken = $_POST["autokentekenvak"];

    //autogegevens uit de tabel halen-------------
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



    //klantgegevens in een nieuw form laten zien ------------
    echo "<form action='gar-update-auto3.php' method='post'>";
    foreach ($autos as $auto) {
        //autokenteken mag niet gewijzigd worden
        echo " autokenteken:" . $auto["autokenteken"];
        echo " <input type='hidden' name='autokentekenvak' ";
        echo " value= '" . $auto["autokenteken"] . " '> <br /> ";

        echo "automerk: <input type='text' ";
        echo " name = 'automerkvak' ";
        echo " value = '" . $auto["automerk"] . "' ";
        echo " > <br />";

        echo "autotype: <input type='text' ";
        echo " name = 'autotypevak' ";
        echo " value = '" . $auto["autotype"] . "' ";
        echo " > <br />";

        echo " autokmstand: <input type='text' ";
        echo " name = 'autokmstandvak' ";
        echo "value = '" . $auto["autokmstand"] . "' ";
        echo " > <br />";

        echo " klantid: <input type='text' ";
        echo " name = 'klantidvak' ";
        echo " value = '" . $auto["klantid"] . "' ";
        echo " > <br />";


        echo "<input type='submit'>";
        echo "</form>";
    }


if ($auto["autokenteken"] != $autokenteken)
{
    echo "Kenteken niet gevonden.</br>";
    echo "<a href='gar-menu.php'> terug naar het menu </a>";
}
        //eigenlijk nog controleren op bestaand klantid
?>
</body>
</html>