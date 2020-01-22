<?php
/* API per la stampa del numveicoli filtrati secondo un criterio */

require 'config.php';                                         //includiamo file di configurazione
header("Content-Type: application/json; charset=UTF-8");      /* info passate tramite header per indicare la tipologia di valore
                                                              ritornato in seguito all'elaborazione del codice della pagina web */
$link = mysqli_connect(DB_SERVER , DB_USER, DB_PASSWORD, DB_DATABASE);     //connessione al db

if (!$link) {      //se la connessione non è avvenuta stampiamo un messaggio di avvertimento
  echo "Errore: Impossibile connettersi al database MySQL." . PHP_EOL;
  echo "<br />Debugging errno: " . my_sqli_errno() . PHP_EOL;
  echo "<br />Debugging error: " . my_sqli_error() . PHP_EOL;
  exit;
}
$params = array(); // creo l'array dove inserire i parametri di comune e anno
$parts = explode('/', $_SERVER['REQUEST_URI']); //suddivido la REQUEST_URI in base agli '/'
$i = count($parts)-3; // estraggo il comune dalla REQUEST_URI
$params[0] = $parts[$i];
$i = count($parts)-1; // estraggo l'anno dalla REQUEST_URI
$params[1] = $parts[$i];


//and make it work with your exsisting code
$_GET = $params;
if (($_GET['0'] !== null)&&($_GET['1'] !== null)) {                                                     //se effettuiamo la ricerca in base alla provincia 
   $query = "SELECT * FROM NUMEROVEICOLI WHERE COMUNE = '".$_GET['0']."'"."AND ANNO = '".$_GET['1']."'";    //query che andremo ad eseguire
} 

  
$array_data = array();                                   //creiamo array vuoto;
if (mysqli_real_query($link, $query)) {                  //tramite questa funz. eseguiamo la query memorizz. nella variabile
  if ($result = mysqli_use_result($link)) {              //tramite questa funzione preleviamo l'ultimo risultato (della query) eseguito sul database $link
    while ($row = mysqli_fetch_row($result)) {           //tramite questa funzione analizziamo tutte le righe (una dopo l'altra) partendo dalla 1° fino all'ultima, fermandoci appena viene restituito 'false'
      $array_data[] = array(
                "PROVINCIA"    => "$row[0]",
                "COMUNE"       => "$row[1]",             //memorizziamo nell'array le info che ci interessano
                "ANNO"         => "$row[2]",
				"NUMVEICOLI"   => "$row[3]",
				 );
    }
    //se l'array risulta essere vuoto
    if (count($array_data) == 0) {
      http_response_code(400);        //modifichiamo il codice di risposta di HTTP impostandolo 400
      exit;                           //terminiamo l'esecuzione dello script
    }
  }
} else {
  http_response_code(400);        //modifichiamo il codice di risposta di HTTP impostandolo 400
  exit;                           //terminiamo l'esecuzione dello script
}
 
$elencoNumVeicoli = json_encode($array_data);       //codifichiamo l'array in json per trasferimento dati tramite richiesta HTTP
mysqli_free_result($result);                        //questa funzione serve per indicare che il risultato della query non ci serve più e liberare la memoria
mysqli_close($link);                                //questa funzione termina la connessione col db
echo "$elencoNumVeicoli";
?>
  