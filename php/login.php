<?php
header('content-type:text/html;charset=utf-8');
if(empty($_POST['info']) || empty($_POST['pwd'])){
	die('非法访问');
}
session_start();
$dns="mysql:host=localhost;dbname=shop2";
$pdo=new PDO($dns,'root','root');
$sql='select mem_id from user where (mem_email=? or mem_phone=?) and mem_pwd=?';
$b=$pdo->prepare($sql);
$b->execute(array($_POST['info'],$_POST['info'],md5($_POST['pwd'])));
$rel=$b->fetchAll(PDO::FETCH_ASSOC);
if($b->rowCount()>0){
	$_SESSION['userid']=$rel[0]['mem_id'];
}
echo $b->rowCount();