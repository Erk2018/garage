<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <title>gar-create-klant1.php</title>
    <link rel="stylesheet" href="style1.css">
</head>
<body>
<h1 class="h1tje">Garage: Create klant - 1</h1>
<div class="creatediv">
<p>
    Dit formulier wordt gebruikt om klantgegevens in te voeren.
</p>
<form action="gar-create-klant2.php" method="post">
    <label for="klantnaamvak">klantnaam:</label>   <input type="text" name="klantnaamvak" id="klantnaamvak">    <br />
    <label for="klantadresvak">klantadres:</label>     <input type="text" name="klantadresvak" id="klantadresvak">   <br />
    <label for="klantpostcodevak">klantpostcode:</label>  <input type="text" name="klantpostcodevak" id="klantpostcodevak"><br />
    <label for="klantplaatsvak">klantplaats:</label>    <input type="text" name="klantplaatsvak" id="klantplaatsvak">  <br />
    <input type="submit">
</form>
</div>
</body>
</html>