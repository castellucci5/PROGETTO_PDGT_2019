<?php
/* API per l'eliminazione di dati passati tramite metodo POST all'interno del database  */
/* Viene utilizzato il metodo POST poichè con questo metodo è possibile passare i dati che si desidera eliminare */

require 'config.php';                                                   //includiamo file di configurazione

$link = mysqli_connect(DB_SERVER , DB_USER, DB_PASSWORD, DB_DATABASE);  //connessione al db
																	    //password
																		// verifica identità utente 
                                                                        //assegno alle variabili locali i dati ricevuti trammite metodo post
$user = $_POST['UTENTE'];
$pass = $_POST['PASSWORD'];																		
$provincia = $_POST['PROVINCIA'];                                       
$comune =  $_POST['COMUNE'];
$anno =  $_POST['ANNO'];
$numveicoli =  $_POST['NUMVEICOLI'];
$verifica_login = 0;                                                     // variabile per la verifica del login                                                                  
$controllo_dati_dupplicati = 0;                                          // variabile per il controllo che i dati da eliminare siano persenti nel database


if (!$link) {                                                            //se la connessione non è avvenuta stampiamo un messaggio di avvertimento
  echo "Errore: Impossibile connettersi al database MySQL." . PHP_EOL;
  echo "<br />Debugging errno: " . my_sqli_errno() . PHP_EOL;
  echo "<br />Debugging error: " . my_sqli_error() . PHP_EOL;
  exit;
}


$query = "SELECT * FROM users WHERE username = '".$username."'"."AND password = '".$password."'";

if (mysqli_real_query($link, $query)) {
 $result = mysqli_use_result($link);
 $row = mysqli_fetch_row($result);

if (($row[1] == $username) && ($row[2] == $password)) {
   echo ("Utente loggato<br>");
	$verifica_login = 1;
                                                                        //controlli sui dati inseriti dall'utente
}else{
	echo ("Username e password errati<br>");
	$verifica_login = 0;
}
}

$query = "SELECT COUNT(*) FROM NUMEROVEICOLI WHERE PROVINCIA = '{$provincia}'AND COMUNE = '{$comune}'AND ANNO = '{$anno}'AND NUMVEICOLI = '{$numveicoli}'";
$result = $link->query($query);
$row = mysqli_fetch_array($result); //creo un'arry per leggere la risposta della query
if ($row[0]> 0) {
		echo ("Dati da eliminare trovati\n"); 
        $controllo_dati_dupplicati=1;
	}
else {
	    echo ("I dati da eliminare non sono prresenti nel database\n");
		$controllo_dati_dupplicati=0;
	}
		
mysqli_free_result($result);                                                    //questa funzione serve per indicare che il risultato della query non ci serve più e liberare la memoria

	
                                                                                //verifico i requisiti prima dell'eliminazione dei dati                    
if (($verifica_login == 1)&&($controllo_dati_dupplicati == 1)) {
  $toinsert = "DELETE FROM NUMEROVEICOLI WHERE PROVINCIA = '{$provincia}'AND COMUNE = '{$comune}'AND ANNO = '{$anno}'AND NUMVEICOLI = '{$numveicoli}'";
}
                                                                                //verifico se l'eliminazione dai dati è avvenuta correttamente
if (mysqli_real_query($link, $toinsert)) {   
	echo("<br>Eliminazione dei dati avvenuta correttamente");
} else{
	echo("<br>Eliminazione dati fallita");
}
mysqli_close($link);
?>