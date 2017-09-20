<?php
header('content-type:text/html;charset=utf-8');
session_start();
$dns="mysql:host=localhost;dbname=shop2";
$pdo=new PDO($dns,'root','root');
$sql='insert into user values(null,?,?,?,?)';
$b=$pdo->prepare($sql);
if(empty($_POST['email'])){
	$b->execute(array(0,$_POST['phone'],md5($_POST['pwd']),time()));
}else{
	$b->execute(array($_POST['email'],0,md5($_POST['pwd']),time()));
}

$userid=$pdo->lastInsertId();
if($b->rowCount()==1){
	$_SESSION['userid']=$userid;
}
echo $b->rowCount();