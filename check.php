<?php
$dns='mysql:host=localhost;dbname=shop';
$pdo=new PDO($dns,"root","root");
$sql='select id from member where username="'.$_GET['e'].'"';
$a=$pdo->prepare($sql);
$a->execute();
echo $a->rowCount();


?>