<?PHP 
//UTILIZZO LA API stampa_db_num_veicoli.php 
// IN SEGUITO SI ESTRAGGONO TUTTI I COMUNI PRESENTI NEL DB PER POTERLI MOSTRARE ALL'UTENTE 
$handle = curl_init('http://giakispeed.altervista.org/PDGT/stampa_db_num_veicoli.php');
                                     //richiesta della risposta HTTP come stringa
curl_setopt($handle, CURLOPT_RETURNTRANSFER, true);
                                     //esecuzione della richiesta HTTP
$response = curl_exec($handle);
                                     //estrazione del codice di risposta (HTTP status)
$http_code = intval(curl_getinfo($handle, CURLINFO_HTTP_CODE));
                                     //stampa ordinata delle info del database
$dati = json_decode($response, true);
                                     //echo $response;
$counter = 0;
$temp1 = 0;
$temp2 = 0;

                                    
 for($i=0;$i < count($dati);$i++){
	
	   if (($dati[$i]['PROVINCIA'] === $temp1) && ($dati[$i]['COMUNE'] === $temp2)){
		  $counter++;
	   }else {
								
           echo "<option value=".'"'.$dati[$i]['COMUNE'].'"'.">".'"'.$dati[$i]['COMUNE'].'"'."</option>" ;  
							    
          $temp1 = $dati[$i]['PROVINCIA'];
          $temp2 = $dati[$i]['COMUNE'];
      }
}	
?>





