	<?php
		foreach ($settings['resources'][0]["js"] as $value) {
			$value		= str_replace("%h%", $settings['url'], $value);
			$value		= str_replace("%m%", $settings['modFolder'], $value);
			$value		= str_replace("%s%",$settings['url'].'/static/scripts', $value);
			echo '<script src="'.$value.'"></script>';
		}
		if($moduleError) {
			echo '<script>'.$moduleError.'</script>';
		}
	?>
	</body>
</html>