<?php
header('content-type:text/html;charset=utf-8');
$dns="mysql:host=localhost;dbname=shop2";
$pdo=new PDO($dns,'root','root');
$sql='select mem_id from user where mem_email=?';
$b=$pdo->prepare($sql);
$b->execute(array($_POST['e']));
echo $b->rowCount();