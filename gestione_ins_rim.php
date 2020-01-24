<!--pagina per la getione delle richieste di inserimento ed eliminazione dei dati mediante l'utilizzo delle API inserire_dati_nel_database.php eliminare_dati_nel_database.php -->
<?php
  
if(isset($_POST['submit_i'])){
    
if((!empty($_POST['provincia_i']))&&(!empty($_POST['comune_i']))&&(!empty($_POST['anno_i']))&&(!empty($_POST['numveicoli_i']))) {
    $username = "testuser";
    $password = "testuserpass";
    $provincia_i = $_POST['provincia_i'];
    $comune_i = $_POST['comune_i'];
    $anno_i = $_POST['anno_i'];
    $numveicoli_i = $_POST['numveicoli_i'];
    $ch = curl_init();                    //richiesta http
    curl_setopt($ch, CURLOPT_URL,"http://giakispeed.altervista.org/PDGT/inserire_dati_nel_database.php"); 
    curl_setopt($ch, CURLOPT_POST, 1); //passaggio dei dati trammite metodo POST 
    curl_setopt($ch, CURLOPT_POSTFIELDS, "UTENTE=".$username."&PASSWORD=".$password."&PROVINCIA=".$provincia_i."&COMUNE=".$comune_i."&ANNO=".$anno_i."&NUMVEICOLI=".$numveicoli_i);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $res = curl_exec($ch);
    $http_code = intval(curl_getinfo($ch, CURLINFO_HTTP_CODE));
    if ($http_code==200){
         
         echo("<span>Inserimento avvenuto correttamente.</span>");  
     }
    else{
        echo("<span>error 400</span><br/>");
        echo("<span>Verificare che la provincia e il comune appartengano alla regione Friuli-Venezia-Giulia</span><br/>");
        echo("<span>verificare che i campi provincia comune e anno che si vogliono inserire non siano già presenti nel database</span><br/>");
        echo("<span>Inserimento fallito.</span>");
        
    }

}
else { 
    echo "<span>Attenzione a non lasciare campi vuoti </span><br/>";
}
}

if(isset($_POST['submit_e'])){
if((!empty($_POST['provincia_e']))&&(!empty($_POST['comune_e']))&&(!empty($_POST['anno_e']))&&(!empty($_POST['numveicoli_e']))) {
    $username = "testuser";
    $password = "testuserpass";
    $provincia_e = $_POST['provincia_e'];
    $comune_e = $_POST['comune_e'];
    $anno_e = $_POST['anno_e'];
    $numveicoli_e = $_POST['numveicoli_e'];
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL,"http://giakispeed.altervista.org/PDGT/eliminare_dati_nel_database.php");
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS,
 "UTENTE=".$username."&PASSWORD=".$password."&PROVINCIA=".$provincia_e."&COMUNE=".$comune_e."&ANNO=".$anno_e."&NUMVEICOLI=".$numveicoli_e);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $res = curl_exec($ch);
    $http_code = intval(curl_getinfo($ch, CURLINFO_HTTP_CODE));
    //curl_close($ch);
    if ($http_code==200){
         
         echo("<span>Eliminazione avvenuta correttamente.</span>");  
     }
    else{
        echo("<span>error 400</span><br/>");
        echo("<span>Verificare che i dati che si vogliono eliminare siano presenti nel database</span><br/>");
        echo("<span>Eliminazione fallita.</span><br/>");
        
    }

    
}
else { 
    echo "<span>Attenzione a non lasciare campi vuoti </span><br/>";
}
}
 
?>