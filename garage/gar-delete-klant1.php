<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <title>gar-delete-klant1.php</title>
    <link rel="stylesheet" href="style1.css"
</head>
<body>
<h1 class="h1tje">Garage: Delete klant - 1</h1>
<div class="creatediv">
<p>
    Dit formulier zoekt een klant op uit
    de tabel 'klant' van database 'garage'
    om hem te kunnen verwijderen.
</p>
<form action='gar-delete-klant2.php' method='post'>
    Welk klantid wilt u verwijderen?
    <input type="text" name="klantidvak"> <br />
    <input type="submit">
</form>
</div>
</body>
</html>