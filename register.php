<?php

if($_GET['p']!="on"){
	// echo 0;
	die('没有选中协议');
}else if($_GET['confirm']!=$_GET['password']){
	// echo 0;
	die('两次密码输入不一致');
}else{
	// echo 2;
	$dns="mysql:host=localhost;dbname=shop";
	$pdo=new PDO($dns,'root','root');
	$sql1='select id from member where username=?';
	$b=$pdo->prepare($sql1);
	$b->execute(array($_GET['e']));
	if($b->rowCount()>0){
		// echo 0;
		die('用户名重复');
	}else{
		$sql='insert into member(username,password,email) values(?,?,?)';
		$a=$pdo->prepare($sql);
		$a->execute(array($_GET['e'],$_GET['password'],$_GET['e']));
		if($a->rowCount()==1){
			$c=$pdo->prepare($sql1);
			$c->execute(array($_GET['e']));
			$re=$c->fetchAll(PDO::FETCH_ASSOC);
			setCookie('id',$re[0]['id']);
		}
		echo $a->rowCount();
}
}


?>