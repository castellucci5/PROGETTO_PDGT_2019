# PROGETTO_PDGT_2019
Progetto d'esame per PDGT A.A. 2018-2019
Studente: Castellucci    Giacomo Matricola: 279269

# INTRODUZIONE
Questo progetto prevede di creare delle API per poter visualizzare, aggiungere o eliminare dati all'interno di un database OPENDATA inserito nello spazio server gratuito messo a disposizione da Altervista, inoltre verrà creato un lato client costituito principalmente da due parti indipandanti entrambe volte all'utilizzo delle API create.
Il lato client sarà costituito da due parti indipendenti una utilizzata per il "collaudo delle API" ed è costituita da uno sketch php con interfaccia a riga di comando.
La seconda parte del lato client invece prevede di creare un lato client costituito da una pagina HTML che utilizzi sia le API create per poter accedere al database OPENDATA su altervista, sia delle API esterne fonite dal sito di GOOGLE MAPS.

# DOCUMENTAZIONE API
<strong>stampa_db_num_veicoli.php</strong> <br />
Questa API permette di visualizzare tutti i comuni della regione Friuli Venezia Giulia presenti all'interno del database ognuno con il numero di veicoli relativamente all'anno in cui è avvenuto il campionamento.
Non richiede parametri. Se la richiesta HTTP(metodo GET) ha successo restituisce la lista dei comuni in formato JSON, altrimenti ritorna lo stato HTTP #400.

<br /><br /><i>Esempio di lista in JSON restituita:</i><br /><br />

[<br />
 &nbsp;&nbsp;&nbsp;{<br />
 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"PROVINCIA":"GORIZIA",<br />
 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"COMUNE":"CAPRIVA DEL FRIULI",<br />
 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"ANNO":"1999-2000"<br />
 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"NUMVEICOLI":"320"<br />
 &nbsp;&nbsp;&nbsp;},<br />
 &nbsp;&nbsp;&nbsp;{<br />
 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"PROVINCIA":"GORIZIA",<br />
 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"COMUNE":"CAPRIVA DEL FRIULI",<br />
 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"ANNO":"2000-2001"<br />
 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"NUMVEICOLI":"173"<br />
 &nbsp;&nbsp;&nbsp;},<br />
 &nbsp;&nbsp;&nbsp;{<br />
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"PROVINCIA":"GORIZIA",<br />
 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"COMUNE":"CAPRIVA DEL FRIULI",<br />
 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"ANNO":"2001-2002"<br />
 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"NUMVEICOLI":"249"<br />
 &nbsp;&nbsp;&nbsp;}<br />
 &nbsp;&nbsp;&nbsp;{<br />
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"PROVINCIA":"GORIZIA",<br />
 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"COMUNE":"CAPRIVA DEL FRIULI",<br />
 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"ANNO":"2002-2003"<br />
 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"NUMVEICOLI":"196"<br />
 &nbsp;&nbsp;&nbsp;}<br />
]<br />

<br /><br />


<strong>stampa_dati_sel_num_veicoli.php</strong> <br />
Questa API permette di effettuare una ricerca specifica nel database, andando a cercare l'unico parametro passato nella query. Se la richiesta HTTP (metodo GET) ha successo restituisce la lista dei campionamenti (intera riga del database) del numero di veicoli richiesti in formato JSON, altrimenti ritorna lo stato HTTP #400.

<table>
  <tr>
    <td><b>Parametri</b></td>
    <td><b>Tipo</b></td>
    <td><b>Descrizione</b></td>
  </tr>
  <tr>
    <td>PROVINCIA</td>
    <td>Stringa</td>
    <td>permette di filtrare il database in base alla provincia .</td>
  </tr>
  <tr>
    <td>COMUNE</td>
    <td>Stringa</td>
    <td>permette di filtrare il database in base al comune.</td>
  </tr>
  <tr>
    <td>ANNO</td>
    <td>Stringa</td>
    <td>permette di filtrare il database in base all'anno di campionamento.</td>
  </tr>
</table>

<br /><i>Esempio di URL valido, completo di query:</i><br />
http://giakispeed.altervista.org/PDGT/stampa_dati_sel_num_veicoli.php?PROVINCIA=GORIZIA

http://giakispeed.altervista.org/PDGT/stampa_dati_sel_num_veicoli.php?COMUNE=CAPRIVA+DEL+FRIULI

http://giakispeed.altervista.org/PDGT/stampa_dati_sel_num_veicoli.php?ANNO=1999-2000

<br /><br />
<strong>stampa_sel_doppia_num_veicoli.php</strong> <br />
Questa API permette di effettuare una ricerca specifica nel database, andando a cercare in base ai 2 parametri passati nella query. Se la richiesta HTTP (metodo GET) ha successo restituisce un solo capionamento in quanto ogni comune avrà un campionamento (intera riga del database) per anno del numero di veicoli richiesti in formato JSON, altrimenti ritorna lo stato HTTP #400.

<table>
  <tr>
    <td><b>Parametri</b></td>
    <td><b>Tipo</b></td>
    <td><b>Descrizione</b></td>
  </tr>
  <tr>
    <td>COMUNE</td>
    <td>Stringa</td>
    <td>permette di filtrare il database in base al comune.</td>
  </tr>
  <tr>
    <td>ANNO</td>
    <td>Stringa</td>
    <td>permette di filtrare il database in base all'anno di campionamento.</td>
  </tr>
</table>

<br /><i>Esempio di URL valido, completo di query:</i><br />
http://giakispeed.altervista.org/PDGT/stampa_sel_doppia_num_veicoli.php?COMUNE=CAPRIVA+DEL+FRIULI&ANNO=1999-2000


<br /><br />

<strong>inserire_dati_nel_database.php</strong> <br />
Questa API permette di inserire dati (aggiunge una riga) all'interno del database. I dati vengono ricevuti taramite richiesta http (metodo POST).All'interno dei dati POST inviati in questo caso sarà necessario anche inviare i dati di accesso dell'utente che intende effettuare l'operazione. L'API risponderà con un messaggio di conferma di avventuto inserimento oppure con un messaggio di insuccesso. Specificando il motivo dell'insucceso.

<table>
  <tr>
    <td><b>Parametri</b></td>
    <td><b>Tipo</b></td>
    <td><b>Descrizione</b></td>
  </tr>
 <tr>
    <td>UTENTE</td>
    <td>Stringa</td>
    <td>inserire il nome utente.</td>
  </tr>
 <tr>
    <td>PASSWORD</td>
    <td>Stringa</td>
    <td>inserire la password .</td>
  </tr>
  <tr>
    <td>PROVINCIA</td>
    <td>Stringa</td>
    <td>inserie quale provincia aggiungere nel database.</td>
  </tr>
  <tr>
    <td>COMUNE</td>
    <td>Stringa</td>
    <td>inserire quale comune aggiungere al database.</td>
  </tr>
  <tr>
    <td>ANNO</td>
    <td>Stringa</td>
    <td>inseriere quale anno aggiunere al database .</td>
   
  </tr>
  <tr>
    <td>NUMVEICOLI</td>
    <td>Stringa</td>
    <td>inseriere il numero di veicoli che si vuole aggiungere al database.</td>
  
  </tr>
  
  
</table>

<br /><i>l'url di riferimento per l'invio di dati tramite metodo POST é il seguente:</i><br />
http://giakispeed.altervista.org/PDGT/inserire_dati_nel_database.php

*****

<strong>eliminare_dati_nel_database.php</strong> <br />
Questa API permette di eliminare dati (elimina una riga) all'interno del database. I dati vengono ricevuti taramite richiesta http (metodo POST).All'interno dei dati POST inviati in questo caso sarà necessario anche inviare i dati di accesso dell'utente che intende effettuare l'operazione. L'API risponderà con un messaggio di conferma di avventuta eliminazione oppure con un messaggio di insuccesso. Prima dell'eliminazione viene verificata l'identità dell'utente e la presenza dei dati da eliminare nel database e viene infine segnalato il successo o l'insucceso della richiesta.

<table>
  <tr>
    <td><b>Parametri</b></td>
    <td><b>Tipo</b></td>
    <td><b>Descrizione</b></td>
  </tr>
 <tr>
    <td>UTENTE</td>
    <td>Stringa</td>
    <td>inserire il nome utente.</td>
  </tr>
 <tr>
    <td>PASSWORD</td>
    <td>Stringa</td>
    <td>inserire la password .</td>
  </tr>
  <tr>
    <td>PROVINCIA</td>
    <td>Stringa</td>
    <td>inserie quale provincia eliminare nel database.</td>
  </tr>
  <tr>
    <td>COMUNE</td>
    <td>Stringa</td>
    <td>inserire quale comune eliminare nel database.</td>
  </tr>
  <tr>
    <td>ANNO</td>
    <td>Stringa</td>
    <td>inseriere quale anno eliminare nel database .</td>
   
  </tr>
  <tr>
    <td>NUMVEICOLI</td>
    <td>Stringa</td>
    <td>inseriere il numero di veicoli che si vuole eliminare nel database.</td>
  
  </tr>
  
  
</table>

<br /><i>l'url di riferimento per l'invio di dati tramite metodo POST relativi alla richiesta di eliminazione é il seguente:</i><br />
http://giakispeed.altervista.org/PDGT/eliminare_dati_nel_database.php

# Documentazione CLIENT

Il file client.php è stato sviluppato per interagire con le API, è scritto in linguaggio PHP ed è stato ottimizzato per un'esecuzione da CLI. <br />
Una volta aperto da riga di comando, il programma stampa a video un breve messaggio di introduzione (info programmatore e info del client) seguito da un menù di selezione riguardante le varie funzioni messe a disposizione dal client, ognuna delle quali selezionabile inserendo il numero che la precede e identifica, seguito dal tasto 'invio'. <br />
Selezionando l'opzione '1' viene stampata a schermo la lista completa dei campionamenti del numero di veicoli contenuti nel database ,le informazioni vengono prelevate tramite richiesta HTTP all' API 'stampa_db_num_veicoli.php'.<br />
Selezionando l'opzione '2',viene richiesto di inserire la provincia con la quale filtrare il database, le informazioni vengono prelevate mediante richiesta HTTP all' API 'stampa_dati_sel_num_veicoli.php'.<br />
Selezionando l'opzione '3',viene richiesto di inserire il comune con la quale filtrare il database, le informazioni vengono prelevate mediante richiesta HTTP all' API 'stampa_dati_sel_num_veicoli.php'.<br />
Selezionando l'opzione '4',viene richiesto di inserire l'anno con la quale filtrare il database, le informazioni vengono prelevate mediante richiesta HTTP all' API 'stampa_dati_sel_num_veicoli.php'.<br />
Selezionando l'opzione '5',viene richiesto di inserire il comune e successivamente l'anno con i quali filtrare il database, le informazioni vengono prelevate mediante richiesta HTTP all' API 'stampa_sel_doppia_num_veicoli.php'.<br />
Selezionando l'opzione '6',viene richiesto di inserire i seguenti dati ognuno seguito da invio: username, password, provincia, comune, anno, numero di veicoli da inserire, le informazioni vengono inviate al database mediante richiesta HTTP all' API 'inserire_dati_nel_database.php'.<br />
Selezionando l'opzione '7',viene richiesto di inserire i seguenti dati ognuno seguito da invio: username, password, provincia, comune, anno, numero di veicoli da eliminare, le informazioni vengono inviate al database mediante richiesta HTTP all' API 'eliminare_dati_nel_database.php'.<br />
Selezionando l'opzione '8',viene terminat0o il client.<br />
. <br /><br />
