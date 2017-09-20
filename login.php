<?php
$user=$_GET['username'];

$password=$_GET['password'];
// echo $user;
// echo $password;
if($user!='' && $password!=''){
	// echo 1;
    	$dns='mysql:host=localhost;dbname=shop';
    	$pdo=new PDO($dns,'root','root');
    	$sql='select * from member where username=? and password=?';
    	$a=$pdo->prepare($sql);

    	// echo $sql;
    	$a->execute(array($_GET['username'],$_GET['password']));
        if($a->rowCount()>0){
            $re=$a->fetchAll(PDO::FETCH_ASSOC);
            setCookie('id',$re[0]['id']);//会话控制
        }
    	echo $a->rowCount();

    

    }else{
    	
    	echo 0;
    }

?>