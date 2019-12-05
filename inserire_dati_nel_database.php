
<?php
/* API per l'inserimento di dati passati tramite metodo POST all'interno del database  */

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

if (!$link) {                                                          //se la connessione non è avvenuta stampiamo un messaggio di avvertimento
  echo "Errore: Impossibile connettersi al database MySQL." . PHP_EOL;
  echo "<br />Debugging errno: " . my_sqli_errno() . PHP_EOL;
  echo "<br />Debugging error: " . my_sqli_error() . PHP_EOL;
  exit;
}

                                                                       //controllo l'identà di chi vuole inserire i dati e 
																	   //la presenza di dati da inserire nel data base 
elseif (($user == MY_UTENTE)&&($pass == MY_PASSWORD)&&($provincia!== null)&&($comune!== null)&&($anno!== null)&&($numveicoli!== null)) {
  $toinsert = "INSERT INTO NUMEROVEICOLI
			(PROVINCIA,COMUNE,ANNO,NUMVEICOLI)
			VALUES".
			"('".$provincia."','".$comune."','".$anno."','".$numveicoli."')";
}
                                                                      //verifico se l'inserimento dai dati è avvenuto correttamente
if (mysqli_real_query($link, $toinsert)) {   
	echo("<br>Inserimento avvenuto correttamente");
} else{
	echo("<br>Inserimento non eseguito correttamente o utente non identificato");
}

?>