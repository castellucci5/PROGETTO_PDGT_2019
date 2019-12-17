<?php
if(isset($_POST['submit'])){
if(!empty($_POST['anno'])) {
echo "<span>ANNO SELEZIONATO :</span><br/>";
// As output of $_POST['Color'] is an array we have to use Foreach Loop to display individual value
foreach ($_POST['anno'] as $select)
{
echo "<span><b>".$select."</b></span><br/>";
}
}
else { echo "<span>Prego seleziona un anno dalla lista .</span><br/>";}
}
?>