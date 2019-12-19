<?php
require 'config.php';
//ricezione le credenziali dell'utente mediante metodo post 
$username = $_POST['Utente'];
$password = $_POST['Password'];

//connessione al database
$link = mysqli_connect(DB_SERVER , DB_USER, DB_PASSWORD, DB_DATABASE); 

if (!$link) {  
  //se la connessione non è avvenuta stampiamo un messaggio di avvertimento
  echo "Errore: Impossibile connettersi al database MySQL." . PHP_EOL;
  echo "<br />Debugging errno: " . my_sqli_errno() . PHP_EOL;
  echo "<br />Debugging error: " . my_sqli_error() . PHP_EOL;
  exit;
}
//creazione della query per andare a cercare nella tabella le credenziali inseritedall'utente
$query = "SELECT * FROM users WHERE username = '".$username."'"."AND password = '".$password."'";

if (mysqli_real_query($link, $query)) {
 $result = mysqli_use_result($link);
 $row = mysqli_fetch_row($result);

if (($row[1] == $username) && ($row[2] == $password)) {
   //stampa del' messaggio in formato html di avvenuto login
   echo ("<span><b>UTENTE LOGGATO</b></span><br/>");
   //stampa del link per accedere alla pagina del sito 
   echo "<a href=http://localhost/progetto/Ricerca_numveicoli.php>ENTRA</a>"; 
    
    exit;
    }
else {
	//stampa del fallimento del login 
    echo ("<span><b>LOGIN FALLITO</b></span><br/>");
    
	 exit;
	 
}
}	else {
	 echo ("error connection 400");
}


?>
