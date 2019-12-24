<?php
/* API per l'inserimento di dati passati tramite metodo POST all'interno del database  */

require 'config.php';                                                   //includiamo file di configurazione

$link = mysqli_connect(DB_SERVER , DB_USER, DB_PASSWORD, DB_DATABASE);  //connessione al db
																	    //password
                                                                        //assegno alle variabili locali i dati ricevuti trammite metodo post
$user = $_POST['UTENTE'];
$pass = $_POST['PASSWORD'];																		
$provincia = $_POST['PROVINCIA'];                                       
$comune =  $_POST['COMUNE'];
$anno =  $_POST['ANNO'];
$numveicoli =  $_POST['NUMVEICOLI'];
$verifica_login = 0;                                                    // variabile per la verifica del login                                                                  
$controllo_regione = 0;                                                 // variabile che controlla se il comune e la provincia che si vogliono inserire 
                                                                        // fanno parte della regione ovvero se sono già presenti nel database      
$controllo_dati_dupplicati = 0;                                           // variabile per il controllo che i dati inseriti non siano già persenti


if (!$link) {                                                           //se la connessione non è avvenuta stampiamo un messaggio di avvertimento
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
   echo ("<span>Utente loggato</span><br>");
	$verifica_login = 1;
                                                                        //controlli sui dati inseriti dall'utente
}else{
	echo ("<span>Username e password errati</span><br>");
	$verifica_login = 0;
}
}  
                                                                        //controllo se la provincia e il comune che si vogliono 
																		//inserire fanno già parte del database ovvero della regione 
//$provincia = mysql_real_escape_string($provincia);
//$comune = mysql_real_escape_string($comune);
$query = "SELECT COUNT(*) FROM NUMEROVEICOLI WHERE PROVINCIA = '{$provincia}'AND COMUNE = '{$comune}'";
$result = $link->query($query);
$row=mysqli_fetch_array($result); //creo un'arry per leggere la risposta della query

if ($row[0]> 0) {
    echo ("<span>Ok,la provincia e il comune sono appartenenti alla regione,</span><br>");
    $controllo_regione = 1;	
    }
else {
	 echo ("<span>Attenzione, la provincia e il comune non sono appartenenti alla regione,</span><br>");
	 $controllo_regione = 0;
}	

mysqli_free_result($result);                        //questa funzione serve per indicare che il risultato della query non ci serve più e liberare la memoria
                                                    //controllo se  i dati che si vogliono inserire sono già presenti nel database																	   

$query   = "SELECT COUNT(*) FROM NUMEROVEICOLI WHERE PROVINCIA = '{$provincia}'AND COMUNE = '{$comune}'AND ANNO = '{$anno}'";
$result = $link->query($query);
$row=mysqli_fetch_array($result); //creo un'arry per leggere la risposta della query
if ($row[0]> 0) {
		echo ("<span>ATTENZIONE,i dati da inserire sono già presenti nel database,</span><br>"); 
        $controllo_dati_dupplicati=0;
	}
else {
		$controllo_dati_dupplicati=1;
	}
		
mysqli_free_result($result);                        //questa funzione serve per indicare che il risultato della query non ci serve più e liberare la memoria

	
                                                   //verifico i requisiti prima dell'inserimento                    
if (($verifica_login == 1)&&($controllo_regione == 1)&&($controllo_dati_dupplicati == 1)) {
  $toinsert = "INSERT INTO NUMEROVEICOLI
			(PROVINCIA,COMUNE,ANNO,NUMVEICOLI)
			VALUES".
			"('".$provincia."','".$comune."','".$anno."','".$numveicoli."')";
}
                                                                      //verifico se l'inserimento dai dati è avvenuto correttamente
if (mysqli_real_query($link, $toinsert)) {   
	echo("<span>Inserimento avvenuto correttamente.</span>");
} else{
	echo("<span>Inserimento fallito.</span>");
}
mysqli_close($link);
?>