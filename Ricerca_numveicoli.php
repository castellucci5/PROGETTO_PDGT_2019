
<!DOCTYPE html>
<html>
<head>
<title>FRIULI-VENEZIA-GIULIA </title> <!-- Inserimento del titolo-->
<link href="style.css" rel="stylesheet">
</head>
<body>
<div class="container">
<div class="main">
<h2>RICERCA DEL NUMERO DI VEICOLI</h2>
<form action="form.php" method="post"> <!--creazione del form-->
<!----- Menu per selezionare il comune ----->
<label class="heading">SELEZIONARE UN COMUNE :</label>
<select multiple name="Comuni[]">
<?php include'campi_selezione.php';?> <!--esposiszione dei comuni presenti nel database-->
</select>
<?php include'select_comune.php'; ?>  <!--gestione del comune selezionato-->
<!----- Menu per selezionre l'anno ----->    
<label class="heading">SELEZIONA L'ANNO :</label>
<select multiple name="anno[]">
<?php include'campi_anno.php';?>      <!--esposizione dei campi anno presenti-->
</select>
<?php include'select_anno.php'; ?>    <!--gestione dell'anno selezionato-->
<!---- creazione di bottoni di tipo radio di prova  ----->
<label class="heading">Radio Buttons :</label>
<input name="radio" type="radio" value="Radio 1">Radio 1
<input name="radio" type="radio" value="Radio 2">Radio 2
<input name="radio" type="radio" value="Radio 3">Radio 3
<input name="radio" type="radio" value="Radio 4">Radio 4
<?php include'radio_value.php'; ?> 
<input name="submit" type="submit" value="RICERCA NUMERO VEICOLI"> <!--creazione del bottone di invio-->
<?php include'richiesta_database.php'; ?> <!--ricerca dei dati selezionati nel database -->     
</form>
</div>
</div>
</body>
</html>