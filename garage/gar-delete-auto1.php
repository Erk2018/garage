<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <title>gar-delete-auto1.php</title>
    <link rel="stylesheet" href="style1.css">
</head>
<body>
<h1 class="h1tje">Garage: Delete auto - 1</h1>
<div class="creatediv">
<p>
    Dit formulier zoekt een auto op uit
    de tabel 'auto' van database 'garage'
    om hem te kunnen verwijderen.
</p>
<form action="gar-delete-auto2.php" method="post">
    Typ het kenteken in van de auto die u wilt verwijderen.
    <input type="text" name="autokentekenvak"> <br />
    <input type="submit">
</form>
</div>
</body>
</html>