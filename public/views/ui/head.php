<!doctype html>
<html ng-app="stage">
	<head>
		<title><?=(isset($settings["title"]))? $settings["title"]: 'Robin Timman'?></title>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<meta name="apple-mobile-web-app-capable" content="yes">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimum-scale=1.0, maximum-scale=1.0">		
		<meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
		<link rel="apple-touch-icon-precomposed" href="/static/images/logo.png">

		<?php
		foreach ($settings['resources'][0]["css"] as $key => $value) {
			$value		= str_replace("%h%", $settings['url'], $value);
			$value		= str_replace("%m%", $settings['modFolder'], $value);
			$value		= str_replace("%s%",$settings['url'].'/static/css', $value);
			echo '<link rel="stylesheet" href="'.$value.'">';
		}
		?>
		<script>
		  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
		  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
		  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
		  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');
		
		  ga('create', 'UA-51097543-1', 'beamchallenge.nl');
		  ga('send', 'pageview');
		
		</script>
	</head>
	<body ng-class="{browser: browser, 'ohidden': modal.show}" ng-controller="<?=isset($settings["controller"])? $settings["controller"] : 'indexController'?>">