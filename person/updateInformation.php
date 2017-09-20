<?php
$dns='mysql:host=localhost;dbname=shop';
$pdo=new PDO($dns,'root','root');
$sql="update member set nicheng=?,name=?,sex=?,tel=?,email=?,introduce=? where id=?";
$a=$pdo->prepare($sql);
$a->execute(array($_POST['nicheng'],$_POST['name'],$_POST['radio'],$_POST['tel'],$_POST['email'],$_POST['qianming'],$_COOKIE['id']));
echo $a->rowCount();






?>