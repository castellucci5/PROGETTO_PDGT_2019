
<?php
/*in questa sezione viene utilizzata la api che effettua la ricerca in base 
 a comune e anno.*/
//Una volta ricevuto il click del bottone e verifico la presenza dei dati necessari. 
if(isset($_POST['submit'])){
if((!empty($_POST['Comuni']))&&(!empty($_POST['anno']))) {
    
    foreach ($_POST['Comuni'] as $select) {
        
        $research = $select;
    } 
    foreach ($_POST['anno'] as $select)
    {
        $researchb = $select;
    } 

   
    $handle = curl_init('http://giakispeed.altervista.org/PDGT/stampa_sel_doppia_num_veicoli.php/COMUNE/'.$research.'/ANNO/'.$researchb);
                                     //richiesta della risposta HTTP come stringa
    curl_setopt($handle, CURLOPT_RETURNTRANSFER, true);
                                     //esecuzione della richiesta HTTP
    $response = curl_exec($handle);
                                     //estrazione del codice di risposta (HTTP status)
    $http_code = intval(curl_getinfo($handle, CURLINFO_HTTP_CODE));
    
    if ($http_code==200){
    
    
                                     //stampa ordinata delle info del database
    $dati = json_decode($response, true);
                                     //echo $response;
    echo "<span>PROVINCIA: ".$dati[0]['PROVINCIA']."</span><br/>";    
    echo "<span>COMUNE: ".$research."</span><br/>";
    echo "<span>ANNO: ".$researchb."</span><br/>";
    echo "<span>NUMERO DI VEICOLI:  ".$dati[0]['NUMVEICOLI']."</span><br/>";
                                     //print_r($dati[0]['PROVINCIA']);
                                     //$array_output = array(); 
    }else{
        echo "<span>CODICE ERRORECONNESSIONE:".$http_code." </span><br/>";
        
        
    }
 
 }else {
    echo "<span>INSERIRE TUTTI I PARAMETRI RICHIESTI</span><br/>"; 
     
 }
}
   
?>