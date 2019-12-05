<?php
/* API per l'inserimento di dati passati tramite metodo POST all'interno del database  */

require 'config.php';                                                   //includiamo file di configurazione
/
$link = mysqli_connect(DB_SERVER , DB_USER, DB_PASSWORD, DB_DATABASE);  //connessione al db
                                                                        //assegno alle variabili locali i dati ricevuti trammite metodo post
$provincia = $_POST['PROVINCIA'];                                       
$comune =  $_POST['COMUNE'];
$anno =  $_POST['ANNO'];
$numveicoli =  $_POST['NUMVEICOLI'];
echo "provincia=" .$provincia ;
echo "comune= ".$comune;
echo "anno= ".$anno;
echo "numveicoli=".$numveicoli;
if (!$link) {                                                          //se la connessione non è avvenuta stampiamo un messaggio di avvertimento
  echo "Errore: Impossibile connettersi al database MySQL." . PHP_EOL;
  echo "<br />Debugging errno: " . my_sqli_errno() . PHP_EOL;
  echo "<br />Debugging error: " . my_sqli_error() . PHP_EOL;
  exit;
}

                                                                        //controllo la presenza di dati da inserire nel data base 
elseif (($provincia!== null)&&($comune!== null)&&($anno!== null)&&($numveicoli!== null)) {
  $toinsert = "INSERT INTO NUMEROVEICOLI
			(PROVINCIA,COMUNE,ANNO,NUMVEICOLI)
			VALUES".
			"('".$provincia."','".$comune."','".$anno."','".$numveicoli."')";
}
                                                                      //verifico se l'inserimento dai dati è avvenuto correttamente
if (mysqli_real_query($link, $toinsert)) {   
	echo("<br>Inserimento avvenuto correttamente");
} else{
	echo("<br>Inserimento non eseguito");
}

?>