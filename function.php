<?php
/* File contenente le varie funzioni usate dal client */

/* funzione per la stampa a schermo indentata delle info relative al numero di veicoli per provincia */
function stampa_numero_veicoli($http_code, $response) {
  if ($http_code == 200) {
    //risposta HTTP ok
    $data = json_decode($response, true);

    //stampa info 
	 echo "\n--------------------------------------------------------------------------------------------------\n";
     echo "\n-------------------------------------------------------------------------------------------------\n";
     echo "\n|\tPROVINCIA\t||\t\tCOMUNE\t\t||\tANNO\t\t||NUMVEICOLI\t|\n";	
     echo "\n-------------------------------------------------------------------------------------------------\n";
	 echo "\n-------------------------------------------------------------------------------------------------\n";
    foreach ($data as $info) {
      // formattazione per la stampa della tabella di dati
      if (strlen($info['PROVINCIA'])<=7){
		   printf("|\t%s\t\t|", $info['PROVINCIA']);
	   }
	   else{
	   printf("|\t%s\t|", $info['PROVINCIA']);
	   }
	   if (strlen($info['COMUNE'])<=7){
		   printf("|\t%s\t\t\t|", $info['COMUNE']);
	   }
	   elseif((strlen($info['COMUNE'])>7)&& (strlen($info['COMUNE'])<=15)){
			printf("|\t%s\t\t|", $info['COMUNE']);
	   }
	   elseif ((strlen($info['COMUNE'])>15)&&(strlen($info['COMUNE'])<=23)){
			printf("|\t%s\t|", $info['COMUNE']);
	   }
	    else{
			printf("|\t%s|", $info['COMUNE']);
	   }
	   printf("|\t%s\t|", $info['ANNO']);
	   
	   printf("|\t%s\t|", $info['NUMVEICOLI']);
	 

      echo "\n-------------------------------------------------------------------------------------------------\n";
    }   // end foreach
  } else {
      //se ritorna un codice di errore dalla richiesta HTTP
      echo "\nATTENZIONE ---> La richiesta HTTP ha restituito il codice d'errore #{$http_code}." . PHP_EOL;
  }    //end if-else
}    //end function



?>
