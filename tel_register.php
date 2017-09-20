<?php
// echo $_POST['p'];
if($_POST['p']!="on"){
	echo 0;
}else if($_POST['confirm']!=$_POST['telpwd']){
	echo 0;
}else{
	// echo 2;
	$dns="mysql:host=localhost;dbname=shop";
	$pdo=new PDO($dns,'root','root');
	$sql1='select id from member where username="'.$_POST['phone'].'"';
	$b=$pdo->prepare($sql1);
	$b->execute();
	if($b->rowCount()>0){
		echo 0;
	}else{
		$sql='insert into member(username,password,tel) values("'.$_POST['phone'].'","'.$_POST['telpwd'].'","'.$_POST['phone'].'")';
		$a=$pdo->prepare($sql);
		$a->execute();
		if($a->rowCount()==1){
			$c=$pdo->prepare($sql1);
			$c->execute();
			$re=$c->fetchAll(PDO::FETCH_ASSOC);
			setCookie('id',$re[0]['id']);
		}
		echo $a->rowCount();
}
}


?>