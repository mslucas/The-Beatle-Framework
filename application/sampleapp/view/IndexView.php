<br><br><br><br>
<?php
echo $index_title;
echo '<br><br><br>Senha: ';
echo Password::generatePassword(8, 8);
echo '<br><br><br>Idade:';
echo Calculator::ageCalc('23/05/1991');
echo '<br><br><br>DB:';
//$db = new DB();
//var_dump($db->getDB());
?>