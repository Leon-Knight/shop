<?php
//获取一级导航下的所有产品
function get1($pdo,$cat_id,$page){
	//获取一级分类下的所有产品
	$psql='select * from category c1 join category c2 on c1.cat_id=c2.parent_id join category c3 on c2.cat_id=c3.parent_id join product p on p.cat_id=c3.cat_id where c1.cat_id=? limit '.(($page-1)*3).',3;';
	$ps=$pdo->prepare($psql);
	$ps->execute(array($cat_id));
	$rel=$ps->fetchAll(PDO::FETCH_ASSOC);
	return $rel;
}

//获取二级导航下的所有产品
function get2($pdo,$cat_id,$page){
	//获取二级分类下的所有产品
	$psql='select * from category c1 join category c2 on c1.cat_id=c2.parent_id join product p on p.cat_id=c2.cat_id where c1.cat_id=? limit '.(($page-1)*3).',3;';
	$ps=$pdo->prepare($psql);
	$ps->execute(array($cat_id));
	$rel=$ps->fetchAll(PDO::FETCH_ASSOC);
	return $rel;
}

//获取三级导航下的所有产品
function get3($pdo,$cat_id,$page){
	//获取三级分类下的所有产品
	$psql='select * from product where cat_id=? limit '.(($page-1)*3).',3';
	$ps=$pdo->prepare($psql);
	$ps->execute(array($cat_id));
	$rel=$ps->fetchAll(PDO::FETCH_ASSOC);
	return $rel;
}
?>