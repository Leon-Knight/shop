<?php
	$dns='mysql:host=localhost;dbname=shop';
	$pdo=new PDO($dns,'root','root');
	$a=$pdo->prepare('select * from category where parent_id=0');
	$a->execute();
	$result=$a->fetchAll(PDO::FETCH_ASSOC);
	// print_r($result);
	foreach ($result as $v) {
		echo $v['cat_name'].'<br>';
		$b_sql="select * from category where parent_id=".$v['cat_id'];
	    $b=$pdo->prepare($b_sql);
	    $b->execute();
	    $b_result=$b->fetchAll(PDO::FETCH_ASSOC);
	    foreach ($b_result as $b_results) {
	    	echo '----'.$b_results['cat_name'].'<br>';
	    	$c_sql="select * from category where parent_id=".$b_results['cat_id'];
	    	$c=$pdo->prepare($c_sql);
	    	$c->execute();
	    	$c_result=$c->fetchAll(PDO::FETCH_ASSOC);
	    	foreach ($c_result as $c_results) {
	    		echo '-------->'.$c_results['cat_name'].'<br>';
	    	}
	    }

	}
?>