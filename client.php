<?php
/* File contenente il codice sorgente del client */
                               //includiamo file contenente le funzioni usate dal client
require 'function.php';
                               //stampa info programmatore e client
echo "\n*********************************\n";
echo "|  Progetto PDGT  A.A. 2019/2020   |\n";
echo "|   Studente: Giacomo Castellucci  |\n";
echo "|        Matricola: 279269         |\n";
echo "|                                  |\n";
echo "| Servizio client per collegamento |\n";
echo "|    al database del numero di     |\n";
echo "|     veicoli della regione        |\n";
echo "|    FRIULI VENEZIA GIULIA         |\n";
echo "------------------------------------\n\n";
$close_client = 1;            //impostiamo variabile di controllo ciclo do-while del menù
                              //entriamo nel menù
do {
  echo "\n\nSelezionare la richiesta da eseguire al database: \n";
  echo "\t[1] Stampa completa del database.\n";
  echo "\t[2] Stampa filtrata in base alla provincia.\n";
  echo "\t[3] Stampa filtrata in base al comune.\n";
  echo "\t[4] Stampa filtrata in base all'anno.\n";
  echo "\t[5] Stampa filtrata in base al comune e all'anno.\n";
  echo "\t[6] Inserire una nuovo campionamento (Nuova riga) nel database.\n"; 
  echo "\t[7] Eliminare un campionamento nel database.\n"; 
  echo "\t[8] Chiusura del client.\n\n";
  $first_ch = readline();     //acquisizione scelta dell'utente
  $first_ch = intval($first_ch);
  
   if ($first_ch === 1) {
    //inizializzazione richiesta HTTP tramite CURL
    $handle = curl_init('http://giakispeed.altervista.org/PDGT/stampa_db_num_veicoli.php');
    //richiesta della risposta HTTP come stringa
    curl_setopt($handle, CURLOPT_RETURNTRANSFER, true);
    //esecuzione della richiesta HTTP
    $response = curl_exec($handle);
    //estrazione del codice di risposta (HTTP status)
    $http_code = intval(curl_getinfo($handle, CURLINFO_HTTP_CODE));
    //stampa ordinata delle info del database
    stampa_numero_veicoli ($http_code,$response);
    //TERMINE del codice eseguito per la prima scelta del menù
  }
  elseif ($first_ch === 2) {
	//inserimento della provincia da filtrare 
    echo "inserire una provincia del Friuli-Venezia-Giulia con la quale filtrare la tabella";
    $research = readline();//acquisizione caratteri da filtrare
    //selezione dell'url a cui effettuare richiesta HTTP
    $handle = curl_init('http://giakispeed.altervista.org/PDGT/stampa_dati_sel_num_veicoli.php/PROVINCIA/'.$research);
    //settaggio della risposta HTTP come stringa
    curl_setopt($handle, CURLOPT_RETURNTRANSFER, true);
    //esecuzione della richiesta HTTP
    $response = curl_exec($handle);
    //estrazione del codice di risposta (HTTP status)
    $http_code = intval(curl_getinfo($handle, CURLINFO_HTTP_CODE));
    //stampa ordinata delle info del database
    stampa_numero_veicoli ($http_code,$response);
    //TERMINE del codice eseguito con la seconda scelta del menù
	
  }
  elseif ($first_ch === 3) {
	//inserimento del comune da filtrare 
    echo "inserire un comune del Friuli-Venezia-Giulia con la quale filtrare la tabella";
    $research = readline(); //acquisizione caratteri da filtrare
    //selezione dell'url a cui effettuare richiesta HTTP
    $handle = curl_init('http://giakispeed.altervista.org/PDGT/stampa_dati_sel_num_veicoli.php/COMUNE/'.$research);
    //settaggio della risposta HTTP come stringa
    curl_setopt($handle, CURLOPT_RETURNTRANSFER, true);
    //esecuzione della richiesta HTTP
    $response = curl_exec($handle);
    //estrazione del codice di risposta (HTTP status)
    $http_code = intval(curl_getinfo($handle, CURLINFO_HTTP_CODE));
    //stampa ordinata delle info del database
    stampa_numero_veicoli ($http_code,$response);
    //TERMINE del codice eseguito con la terza scelta del menù
	
  } 
  elseif ($first_ch === 4) { //opzione per filtrare il database base in base a due parametri
	//inserimento dell'anno da filtrare 
    echo "inserire L'anno con la quale filtrare la tabella";
    $research = readline(); //acquisizione caratteri da filtrare
    //selezione dell'url a cui effettuare richiesta HTTP
    $handle = curl_init('http://giakispeed.altervista.org/PDGT/stampa_dati_sel_num_veicoli.php/ANNO/'.$research);
    //settaggio della risposta HTTP come stringa
    curl_setopt($handle, CURLOPT_RETURNTRANSFER, true);
    //esecuzione della richiesta HTTP
    $response = curl_exec($handle);
    //estrazione del codice di risposta (HTTP status)
    $http_code = intval(curl_getinfo($handle, CURLINFO_HTTP_CODE));
    //stampa ordinata delle info del database
    stampa_numero_veicoli ($http_code,$response);
    //TERMINE del codice eseguito con la quarta scelta del menù
	  
  }
  elseif ($first_ch === 5) {
	//inserimento del comune da filtrare 
    echo "inserire un COMUNE del Friuli-Venezia-Giulia con la quale filtrare la tabella";
    $research = readline();  //acquisizione caratteri da filtrare
	//inserimento dell'anno da filtrare 
	echo "inserire un ANNO con IL quale filtrare la tabella";
    $researchb = readline(); //acquisizione caratteri da filtrare
    //selezione dell'url a cui effettuare richiesta HTTP per la richiesta con doppio parametro
    $handle = curl_init('http://giakispeed.altervista.org/PDGT/stampa_sel_doppia_num_veicoli.php/COMUNE/'.$research.'/ANNO/'.$researchb);
    //settaggio della risposta HTTP come stringa
    curl_setopt($handle, CURLOPT_RETURNTRANSFER, true);
    //esecuzione della richiesta HTTP
    $response = curl_exec($handle);
    //estrazione del codice di risposta (HTTP status)
    $http_code = intval(curl_getinfo($handle, CURLINFO_HTTP_CODE));
    //stampa ordinata delle info del database
    stampa_numero_veicoli ($http_code,$response);
    //TERMINE del codice eseguito con la seconda scelta del menù
	
  }
  elseif ($first_ch === 6) {
	//Richiesta  dati utente
	echo "Inserire Nome Utente:";
    $utente = readline();   //nome utente : 'user'
    echo "Inserire password:";
    $password = readline(); //password : 'pass'
    //richiesta dati da inserire nella nuova riga
    echo "Inserire una provincia del Friuli-Venezia-Giulia:";	//richiesta provincia da inserire 
    $provincia  = readline();
    echo "Inserire un comune del Friuli-Venezia-Giulia:";	    //richiesta comune da inserire 
    $comune     = readline();
    echo "Inserire l'anno di campionamento nel seguente formato aaaa-aaaa :";	  //richiesta anno da inserire con formato es: 2018-2019
    $anno       = readline();
    echo "Inserire il numveicoli :";                            //richiesta numero di veicoli da inserie 
    $numveicoli = readline();
    $ch = curl_init();                                          //richiesta http
    curl_setopt($ch, CURLOPT_URL,"http://giakispeed.altervista.org/PDGT/inserire_dati_nel_database.php"); 
    curl_setopt($ch, CURLOPT_POST, 1);                          //passaggio dei dati trammite metodo POST 
    curl_setopt($ch, CURLOPT_POSTFIELDS,
                  "UTENTE=".$utente."&PASSWORD=".$password."&PROVINCIA=".$provincia."&COMUNE=".$comune."&ANNO=".$anno."&NUMVEICOLI=".$numveicoli);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $res = curl_exec($ch);
	$http_code = intval(curl_getinfo($ch, CURLINFO_HTTP_CODE));
        if ($http_code==200){
         
         echo("Inserimento avvenuto correttamente.");  
     }
    else{
        echo("\nERROR 400\n");
	echo("Verificare che i dati di login inseriti siano corretti\n");
        echo("Verificare che la provincia e il comune appartengano alla regione Friuli-Venezia-Giulia\n");
        echo("Verificare che i campi provincia comune e anno che si vogliono inserire non siano già presenti nel database\n");
        echo("Inserimento fallito.");
        
    }
	
	
  }  
  elseif ($first_ch === 7) {
    //Richiesta  dati utente
    echo "Inserire Nome Utente:";
    $utente     = readline();   //nome utente : 'user'
    echo "Inserire password:";
    $password   = readline();   //password : 'pass'
    //richiesta dati da eliminare da database
    echo "Inserire la provincia da eliminare:";	                //richiesta provincia da eliminare
    $provincia  = readline();
    echo "Inserire il comune da eliminare:";	                //richiesta comune da eliminare 
    $comune     = readline();
    echo "Inserire l'anno di campionamento da eliminare nel seguente formato aaaa-aaaa :";	  //richiesta anno da eliminare con formato es: 2018-2019
    $anno       = readline();
    echo "Inserire il numveicoli da eliminare :";               //richiesta numero di veicoli da eliminare 
    $numveicoli = readline();
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL,"http://giakispeed.altervista.org/PDGT/eliminare_dati_nel_database.php");
    //curl_setopt($ch,CURLOPT_CUSTOMREQUEST,"POST");
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS,
                  "UTENTE=".$utente."&PASSWORD=".$password."&PROVINCIA=".$provincia."&COMUNE=".$comune."&ANNO=".$anno."&NUMVEICOLI=".$numveicoli);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $res = curl_exec($ch);
     $http_code = intval(curl_getinfo($ch, CURLINFO_HTTP_CODE));
    //curl_close($ch);
    if ($http_code==200){
         
         echo("Eliminazione avvenuta correttamente.");  
     }
    else{
        echo("\nERROR 400\n");
        echo("Verificare che i dati di login inseriti siano corretti\n");
        echo("Verificare che i dati che si vogliono eliminare siano presenti nel database\n");
        echo("Eliminazione fallita.\n");
        
    }
	
  }  
  elseif ($first_ch === 8) {
    $close_client = 0;         //impostando la variabile a 0 interrompiamo l'esecuzione del client
    echo "\n\nTerminazione corretta del client, arrivederci !\n\n";
    exit;                      //terminazione del programma  
  }
  } while ($close_client !== 0); 
                               //chiusura della sessione CURL
curl_close($handle);
?>
