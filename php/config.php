<?php
include $path.'php/init.php';

$infractions = array(
	"enable"=>"false",
	"database"=>array(
		"Host"=>"localhost",
		"User"=>"root",
		"Pass"=>"password",
		"Database"=>"data"
	)
);
//IF you want to work on the website
$downtime = array(
		"ENABLE"=>"false",
		"REASON"=>"SOME REASON HERE"
);

$edit=false;
if(file_exists($path.'install/index.php')&&(!($page==="install"))){
	die("SETUP STILL EXSITS DELETE OR USE IT");
}
if($page === 'install'){
	return;
}
require_once $path.'/php/classes/db.class.php';
$db = new db($SQL['HOST'], $SQL['USER'], $SQL['PASSWORD'], $SQL['PORT'], $SQL['DATABASE']);

//include $path.'php/functions.php';
include $path.'php/infractionFunction.php';
?>
