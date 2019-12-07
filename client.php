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
  echo "\t[5] Chiusura del client.\n\n";
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
    $handle = curl_init('http://giakispeed.altervista.org/PDGT/stampa_dati_sel_num_veicoli.php?PROVINCIA='.$research);
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
    $handle = curl_init('http://giakispeed.altervista.org/PDGT/stampa_dati_sel_num_veicoli.php?COMUNE='.$research);
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
  elseif ($first_ch === 4) {
	//inserimento dell'anno da filtrare 
    echo "inserire L'anno con la quale filtrare la tabella";
    $research = readline(); //acquisizione caratteri da filtrare
    //selezione dell'url a cui effettuare richiesta HTTP
    $handle = curl_init('http://giakispeed.altervista.org/PDGT/stampa_dati_sel_num_veicoli.php?ANNO='.$research);
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
   elseif ($first_ch ===5 ) {
	$close_client = 0;         //impostando la variabile a 0 interrompiamo l'esecuzione del client
    echo "\n\nTerminazione corretta del client, arrivederci !\n\n";
    exit;                      //terminazione del programma  
  }
  } while ($close_client !== 0); 
                              //chiusura della sessione CURL
curl_close($handle);
?>