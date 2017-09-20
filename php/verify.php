<?php
session_start();
if(strtolower($_SESSION['code'])==strtolower($_POST['code'])){
	echo 1;
}else{
	echo 2;
}