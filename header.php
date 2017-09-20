<?php
session_start();
if(!empty($_SESSION['userid'])){
	$dns="mysql:host=localhost;dbname=shop2";
	$pdo=new PDO($dns,'root','root');
	$sql='select * from user where mem_id=?';
	$b=$pdo->prepare($sql);
	$b->execute(array($_SESSION['userid']));
	$mem=$b->fetchAll(PDO::FETCH_ASSOC);
}
?>
<div class="hmtop">
	<!--顶部导航条 -->
	<div class="am-container header">
		<ul class="message-l">
			<div class="topMessage">
				<div class="menu-hd">
					<?php if(empty($_SESSION['userid'])){ ?>
						<a href="login.html" target="_top" class="h">亲，请登录</a>
						<a href="register.html" target="_top">免费注册</a>
					<?php }else{ ?>
						<strong>欢迎 <?php echo $mem[0]['mem_email']; ?> 访问本网站</strong>
					<?php } ?>
				</div>
			</div>
		</ul>
		<ul class="message-r">
			<div class="topMessage home">
				<div class="menu-hd"><a href="index.php" target="_top" class="h">商城首页</a></div>
			</div>
			<div class="topMessage my-shangcheng">
				<div class="menu-hd MyShangcheng"><a href="person/index.html" target="_top"><i class="am-icon-user am-icon-fw"></i>个人中心</a></div>
			</div>
			<div class="topMessage mini-cart">
				<div class="menu-hd"><a id="mc-menu-hd" href="shopcart.html" target="_top"><i class="am-icon-shopping-cart  am-icon-fw"></i><span>购物车</span><strong id="J_MiniCartNum" class="h">0</strong></a></div>
			</div>
			<div class="topMessage favorite">
				<div class="menu-hd"><a href="#" target="_top"><i class="am-icon-heart am-icon-fw"></i><span>收藏夹</span></a></div>
		</ul>
	</div>

	<!--悬浮搜索框-->

	<div class="nav white">
		<div class="logo"><a href='index.php'><img src="images/logo.png" /></a></div>
		<div class="logoBig">
			<li><a href='index.php'><img src="images/logobig.png" /></a></li>
		</div>

		<div class="search-bar pr">
			<a name="index_none_header_sysc" href="#"></a>
			<form>
				<input id="searchInput" name="index_none_header_sysc" type="text" placeholder="搜索" autocomplete="off">
				<input id="ai-topsearch" class="submit am-btn" value="搜索" index="1" type="submit">
			</form>
		</div>
	</div>

	<div class="clear"></div>
</div>