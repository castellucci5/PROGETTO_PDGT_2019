<?php
if(isset($_POST['submit'])){
if(!empty($_POST['Comuni'])) {
echo "<span>COMUNE SELEZIONATO:</span><br/>";
// As output of $_POST['Color'] is an array we have to use Foreach Loop to display individual value
foreach ($_POST['Comuni'] as $select)
{
echo "<span><b>".$select."</b></span><br/>";
}
}
else { echo "<span>Prego selezionare un comnune</span><br/>";
}
}
?>