<?php
try
{
	$db=new PDO("mysql:host=localhost; dbname=birtat;charset=utf8",'root','');
	//echo "baglandi";
}


catch(PDOExeption $e)
{
	echo $e->getMessage();
}

?>
