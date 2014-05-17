<?php

date_default_timezone_set('Europe/Amsterdam');
	
$page->url			= 'views/pages/'.$_GET["page"].'.php';

if(!file_exists($page->url)){
	echo 'File not exists!';
} else {
	
	//echo $page->url;
	//$page->page		= includeVar($page->url);
	$page->title	= 'Robin Timman';
	
	function requireVar($file){
		ob_start();
		require($file);
		return ob_get_clean();
	}
	function includeVar($file){
		ob_start();
		include($file);
		return ob_get_clean();
	}
	
	include_once('views/doctype.php');
}
?>