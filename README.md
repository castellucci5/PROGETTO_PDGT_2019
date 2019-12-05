# PROGETTO_PDGT_2019
Progetto d'esame per PDGT A.A. 2018-2019
Studente: Castellucci    Giacomo Matricola: 279269

# INTRODUZIONE
Questo progetto prevede di creare delle API per poter visualizzare, aggiungere o eliminare dati all'interno di un database OPENDATA inserito nello spazio server gratuito messo a disposizione da Altervista, inoltre verrà creato un lato client costituito principalmente da due parti indipandanti entrambe volte all'utilizzo delle API create.
Il lato client sarà costituito da due parti indipendenti una utilizzata per il "collaudo delle API" ed è costituita da uno sketch php con interfaccia a riga di comando.
La seconda parte del lato client invece prevede di creare un lato client costituito da una pagina HTML che utilizzi sia le API create per poter accedere al database OPENDATA su altervista, sia delle API esterne fonite dal sito di GOOGLE MAPS.

# DOCUMENTAZIONE API
<strong>#stampa_db_num_veicoli.php</strong> <br />
Questa API permette di visualizzare tutti i comuni della regione Friuli Venezia Giulia presenti all'interno del database ognuno con il numero di veicoli relativamente all'anno in cui è avvenuto il campionamento.
Non richiede parametri. Se la richiesta HTTP ha successo restituisce la lista dei comuni in formato JSON, altrimenti ritorna lo stato HTTP #400.

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


<strong>#stampa_dati_sel_num_veicoli.php</strong> <br />
Questa API permette di effettuare una ricerca specifica nel database, andando a cercare l'unico parametro passato nella query. Se la richiesta HTTP ha successo restituisce la lista dei campionamenti (intera riga del database) del numero di veicoli richiesti in formato JSON, altrimenti ritorna lo stato HTTP #400.

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
<strong>#stampa_sel_doppia_num_veicoli.php</strong> <br />
Questa API permette di effettuare una ricerca specifica nel database, andando a cercare in base ai 2 parametri passati nella query. Se la richiesta HTTP ha successo restituisce un solo capionamento in quanto ogni comune avrà un campionamento (intera riga del database) per anno del numero di veicoli richiesti in formato JSON, altrimenti ritorna lo stato HTTP #400.

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
