<?php
class page{
	private $page_total;//数据的总条数
	private $page_num;//每页显示的条数
	private $pages;//总页数
	private $url;//页面地址
	public $page;//当前页的页码
	function __construct($page_total,$url,$page_num=3){
		$this->page_total=$page_total;
		$this->page_num=$page_num;
		$this->pages=ceil($page_total/$page_num);
		$this->url=$url;
		$this->getCurrentPage();		
	}
	//获取当前页码
	private function getCurrentPage(){
		$this->page=empty($_GET['page']) ? 1 : $_GET['page'];
		if($this->page<1){
			$this->page=1;
			header('location:'.$this->url.'?page=1');
		}else if($this->page>$this->pages){
			$this->page=$this->pages;
			header('location:'.$this->url.'?page='.$this->page);
		}
	}
	//首页
	private function first(){
		return '<li><a href="'.$this->url.'">首页</a></li>';
	}
	//上一页
	private function prev(){
		if($this->page==1){
			return '<li>上一页</li>';
		}else{
			return '<li><a href="'.$this->url.'&page='.($this->page-1).'">上一页</a></li>';
		}
	}
	//其他页
	private function otherPage(){
		$s='';
		if($this->pages<3){
			$start=1;
			$end=$this->pages;
		}else{
			if($this->page==1){
				$start=1;
				$end=$this->page+2;
			}else{
				$start=$this->page-1;
				$end=$this->page+1;
			}
			if($this->page==$this->pages){
				$end=$this->pages;
				$start=$end-2;
			}
		}
		
		for($i=$start;$i<=$end;$i++){
			if($i==$this->page){
				$s.='<li>'.$i.'</li>';
			}else{
				$s.='<li><a href="'.$this->url.'&page='.$i.'">'.$i.'</a></li>';
			}
			
		}
		return $s;
	}
	//下一页
	private function next(){
		if($this->page==$this->pages){
			return '<li>下一页</li>';
		}else{
			return '<li><a href="'.$this->url.'&page='.($this->page+1).'">下一页</a></li>';
		}
	}
	//尾页
	private function end(){
		return '<li><a href="'.$this->url.'&page='.$this->pages.'">尾页</a></li>';
	}
	//跳转
	private function go(){
		return '<li><input type="text" id="go_page"><span id="go">跳转</span></li><script>var go=document.getElementById("go");var go_page=document.getElementById("go_page");go.onclick=function(){location.href="1.php?page="+go_page.value;}</script>';
	}
	function getPage(){
		$data='';
		$data.='<ul id="yan">';
		$data.=$this->first();
		$data.=$this->prev();
		$data.=$this->otherPage();
		$data.=$this->next();
		$data.=$this->end();
		$data.=$this->go();
		$data.='</ul>';
		return $data;		
	}
}
