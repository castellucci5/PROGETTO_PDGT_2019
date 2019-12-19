<?PHP 
				 
echo "<option value=1999-2000>1999-2000</option>" ;   
echo "<option value=2000-2001>2000-2001</option>" ; 
echo "<option value=2001-2002>2001-2002</option>" ; 
echo "<option value=2003-2004>2003-2004</option>" ; 
echo "<option value=2005-2006>2005-2006</option>" ; 
echo "<option value=2009-2010>2009-2010</option>" ; 
echo "<option value=2011-2012>2011-2012</option>" ; 
echo "<option value=2013-2014>2013-2014</option>" ;
//UTILIZZO LA API stampa_db_num_veicoli.php 
//Viene eseguito il controllo sull'ultimo anno inserito verficando che questo non sia lo stesso inserito tra quelli di default e sia diverso dal predente
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
$tem1 = 0;

$i=(count($dati)-1);

                                    
 //for($i=0;$i < count($dati);$i++){
      
	   if (($dati[$i]['ANNO'] == '1999-2000') || ($dati[$i]['ANNO'] == '2000-2001')||($dati[$i]['ANNO'] === '2001-2002')||($dati[$i]['ANNO'] == '2003-2004')||($dati[$i]['ANNO'] == '2005-2006')||($dati[$i]['ANNO'] == '2007-2008')||($dati[$i]['ANNO'] == '2009-2010')||($dati[$i]['ANNO'] == '2011-2012')||($dati[$i]['ANNO'] == '2013-2014')||(($dati[$i]['ANNO']) == ($dati[$i-1]['ANNO']))){
		  $counter++;
	   }else {
								
           echo "<option value=".$dati[$i]['ANNO'].">".$dati[$i]['ANNO']."</option>" ;  
							    
          //$tem1 = $dati[$i]['ANNO'];
          
      }

			
?>





