<!DOCTYPE HTML>
<html>

<head>
	<title>INSERIMENTO E RIMOZIONE DATI</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<div id="frm">
	 <form action="inserimento_rimozione_dati.php" method="post">
		<p>
			<label>PROVINCIA:  <br></label>
			<input type="text" id="provincia_i" name="provincia_i"/>
		</p>
		<p>
			<label>COMUNE:     <br></label>
			<input type="text" id="comune_i" name="comune_i"/>
		</p>
         <p>
			<label>ANNO FORMATO (aaaa-aaaa):  <br></label>
			<input type="text" id="anno_i" name="anno_i"/>
		</p>

        <p>
			<label>NUMVEICOLI: <br></label>
			<input type="text" id="numveicoli_i" name="numveicoli_i"/>
		</p>
		<p>
			<input type="submit" id="btn" name="submit_i" value="INSERISCI" />
		</p>
       
	</form>
     <form action="inserimento_rimozione_dati.php" method="post">
        <p>
			<label>PROVINICIA: <br></label>
			<input type="text" id="provincia_e" name="provincia_e"/>
		</p>
		<p>
			<label>COMUNE:   <br></label>
			<input type="text" id="comune_e" name="comune_e"/>
		</p>
        <p>
			<label>ANNO FORMATO (aaaa-aaaa):  <br></label>
			<input type="text" id="anno_e" name="anno_e"/>
		</p>
        <p>
			<label>NUMVEICOLI: <br></label>
			<input type="text" id="numveicoli_e" name="numveicoli_e"/>
		</p>
		<p>
			<input type="submit" id="btn" name="submit_e" value="ELIMINA" />
		</p>   
      <?php include'gestione_ins_rim.php';?>
     
	</form> 
    <a href=http://localhost/progetto/Ricerca_numveicoli.php>PAGINA PRECEDENTE </a>;
    </div>
</body>
</html>