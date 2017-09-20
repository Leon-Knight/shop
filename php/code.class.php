<?php
class code{
	//画布
	public $img_source;
	//宽
	public $width;
	//高
	public $height;
	//背景色
	public $bgcolor;
	//干扰点个数
	public $num;
	function __construct($width,$height,$num=20){
		$this->width=$width;
		$this->height=$height;
		$this->num=$num;
		$this->img_source=imagecreatetruecolor($width,$height);
	}
	//创建随机背景色
	private function bgcolor(){
		$this->bgcolor=imagecolorallocate($this->img_source,mt_rand(200,255),mt_rand(200,255),mt_rand(200,255));
	}
	//创建随机前景色
	private function bfcolor(){
		return imagecolorallocate($this->img_source,mt_rand(0,100),mt_rand(0,100),mt_rand(0,100));
	}
	//随机宽
	private function rand_width(){
		return mt_rand(0,$this->width-1);
	}
	//随机高
	private function rand_height(){
		return mt_rand(0,$this->height-1);
	}
	//干扰点
	private function points(){
		for($i=0;$i<$this->num;$i++){
			imagesetpixel($this->img_source, $this->rand_width(), $this->rand_height(), $this->bfcolor());
		}
	}
	//文本
	private function text(){
		$c='';
		for($i=0;$i<4;$i++){
			$size=mt_rand(15,25);
			$x1=$i*$this->width/4;
			$x2=$x1+$this->width/4-$size;
			$x=mt_rand($x1,$x2);
			$y1=$this->height-$size;
			$y2=$this->height-5;
			$y=mt_rand($y1,$y2);
			$text='abcdefghjkmnpqrstuvwxyABCDEFGHJKMNPQRSTUVWXY3456789';
			$code=$text[mt_rand(0,strlen($text)-1)];
			$c.=$code;
			imagettftext($this->img_source, $size, mt_rand(-20,20), $x, $y, $this->bfcolor(), 'C:\Windows\Fonts\simsun.ttc', $code);
		}
		return $c;
	}
	//输出验证码
	function showCode(){
		session_start();
		$this->bgcolor();
		imagefill($this->img_source,0,0,$this->bgcolor);
		$this->points();
		// $this->text();
		$_SESSION['code']=$this->text();
		header('content-type:image/png');
		imagepng($this->img_source);
	}
}
$code=new code(100,40);
$code->showCode();