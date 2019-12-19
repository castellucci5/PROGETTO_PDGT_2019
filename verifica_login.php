<!--pagina che si connette alla pagina login_.php per verificare l'identità dell'utente -->
<?php
    
    if(!empty($_POST['user'])&&(!empty($_POST['pass']))) {
        $c = 0;
        $user = $_POST['user'];
        $pass = $_POST['pass'];
        
        $ch = curl_init();                 //richiesta http
        curl_setopt($ch, CURLOPT_URL,"http://giakispeed.altervista.org/PDGT/login_.php"); 
        curl_setopt($ch, CURLOPT_POST, 1); //passaggio dei dati trammite metodo POST 
        curl_setopt($ch, CURLOPT_POSTFIELDS,
                  "Utente=".$user."&Password=".$pass);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, false);
        $result = curl_exec($ch);
        
        curl_close($ch);
        $ch = curl_init();                 //richiesta http
        curl_setopt($ch, CURLOPT_URL,"http://localhost/progetto/gestione_ins_rim.php"); 
        curl_setopt($ch, CURLOPT_POST, 1); //passaggio dei dati trammite metodo POST 
        curl_setopt($ch, CURLOPT_POSTFIELDS,
                  "Utente=".$user."&Password=".$pass);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, false);
        $result = curl_exec($ch);
        curl_close($ch);
        
}else{
        echo ("<span><b>Inserire le credenziali</b></span><br/>");
     }


?>