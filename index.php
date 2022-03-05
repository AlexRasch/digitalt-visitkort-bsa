<?php

	$qrCodes = array(
	
	"alexander",
	"christian",
	"madelene",
	"robin",
	"john",
	"petri",
	"stefan"
	
	);
	$locations = array(
		array("id"=>"orebro","prettyName"=>"Örebro"),
		array("id"=>"goteborg","prettyName"=>"Göteborg")
	);
	
	$people = array(
		array("name"=>"Christian","role"=>"VD","location"=>"goteborg"),
		array("name"=>"Madeléne","role"=>"Administratör","location"=>"goteborg"),
		array("name"=>"Robin","role"=>"Serviceansvarig","location"=>"goteborg"),
		array("name"=>"John","role"=>"Tekniker","location"=>"goteborg"),
		array("name"=>"Petri","role"=>"Tekniker","location"=>"goteborg"),
	
		array("name"=>"Christian","role"=>"VD","location"=>"orebro"),
		array("name"=>"Madeléne","role"=>"Administratör","location"=>"orebro"),
		array("name"=>"Stefan","role"=>"Säljare/Tekniker","location"=>"orebro"),
		array("name"=>"Alexander","role"=>"Säljare/Tekniker","location"=>"orebro")
		
		
	);

	$vCards = $qrCodes;
	
	
	if (!isset($_GET['qr'])) {
		if (!isset($_GET['city'])) {
			$selectedCity = 'orebro';
		} else {
			$selectedCity = $_GET['city'];	
		}
	}

?>

<!DOCTYPE html>
<html lang="sv">
	<head>
		<title>Kontaktuppgifter - BSA AB</title>
		<meta name="robots" content="noindex">
		
		
		<link rel="manifest" href="/manifest.webmanifest">
		
		<meta name="theme-color" content="#ecd96f" media="(prefers-color-scheme: light)">
		<meta name="theme-color" content="#0b3e05" media="(prefers-color-scheme: dark)">
		
		<link rel="apple-touch-icon" href="assets/img/favicon-300x300.png">
		<meta name="apple-touch-fullscreen" content="yes"> 
		<meta name="apple-mobile-web-app-title" content="Kontaktuppgifter - BSA AB">
		<meta name="apple-mobile-web-app-status-bar-style" content="black-translucentt">
		<meta name="apple-mobile-web-app-capable" content="yes">
		
		<link rel="icon" href="assets/img/favicon-300x300.png" sizes="192x192">
		<link rel="stylesheet" href="https://unpkg.com/purecss@1.0.1/build/base-min.css">
		
		<link rel="stylesheet" href="assets/css/pure-min.css">
		<link rel="stylesheet" href="assets/css/main.css">
		<meta name="viewport" content="width=device-width, initial-scale=1">

		<link href="assets/splashscreens/iphone5_splash.png" media="(device-width: 320px) and (device-height: 568px) and (-webkit-device-pixel-ratio: 2)" rel="apple-touch-startup-image" />
		<link href="assets/splashscreens/iphone6_splash.png" media="(device-width: 375px) and (device-height: 667px) and (-webkit-device-pixel-ratio: 2)" rel="apple-touch-startup-image" />
		<link href="assets/splashscreens/iphoneplus_splash.png" media="(device-width: 621px) and (device-height: 1104px) and (-webkit-device-pixel-ratio: 3)" rel="apple-touch-startup-image" />
		<link href="assets/splashscreens/iphonex_splash.png" media="(device-width: 375px) and (device-height: 812px) and (-webkit-device-pixel-ratio: 3)" rel="apple-touch-startup-image" />
		<link href="assets/splashscreens/iphonexr_splash.png" media="(device-width: 414px) and (device-height: 896px) and (-webkit-device-pixel-ratio: 2)" rel="apple-touch-startup-image" />
		<link href="assets/splashscreens/iphonexsmax_splash.png" media="(device-width: 414px) and (device-height: 896px) and (-webkit-device-pixel-ratio: 3)" rel="apple-touch-startup-image" />
		<link href="assets/splashscreens/ipad_splash.png" media="(device-width: 768px) and (device-height: 1024px) and (-webkit-device-pixel-ratio: 2)" rel="apple-touch-startup-image" />
		<link href="assets/splashscreens/ipadpro1_splash.png" media="(device-width: 834px) and (device-height: 1112px) and (-webkit-device-pixel-ratio: 2)" rel="apple-touch-startup-image" />
		<link href="assets/splashscreens/ipadpro3_splash.png" media="(device-width: 834px) and (device-height: 1194px) and (-webkit-device-pixel-ratio: 2)" rel="apple-touch-startup-image" />
		<link href="assets/splashscreens/ipadpro2_splash.png" media="(device-width: 1024px) and (device-height: 1366px) and (-webkit-device-pixel-ratio: 2)" rel="apple-touch-startup-image" />
	</head>
	<body>
	<div class="pure-menu pure-menu-horizontal menu-qr">
		<!-- <a href="#" class="pure-menu-heading pure-menu-link pure-menu-disabled">BSA AB</a> -->
		<ul class="pure-menu-list">
			<?php
			foreach($locations as $location) {
			echo '<li class="pure-menu-item">';
			echo '<a href="?city=' . $location['id'] . '" class="pure-menu-link">' . $location['prettyName'] . '</a>';
			echo '</li>';
			}
			?>
		</ul>
		<!-- <div class="pure-menu-exit">
			<a href="#" onclick="window.close();" class="pure-menu-link">Exit</a>
		</div> -->
	</div>
	<div class="pure-g">
	
	<?php
	
	
	// View single
	if(isset($_GET['qr'])){
			
			$qrCode = $_GET['qr'];
			
			// vCard
			$vCard = $qrCode;
			
			
			if(in_array($qrCode,$qrCodes)) {
				
				echo '<div class="pure-u-1 pure-u-sm-1-1">';
				echo '<img class="pure-img qr-img" src="assets/qr/'.$qrCode.'.png">';
				echo '</div>';
				
				echo '<div class="pure-u-1 pure-u-sm-1-1">';
				//	echo '<form class="pure-form pure-form-aligned">';
				//		echo '<fieldset>';
				//			echo '<div class="pure-control-group">';
								echo '<a href="/vcards/'.$vCard.'.vcf" class="button-xlarge pure-button qr-save">Lägg till kontakt</a>';
					//		echo '</div>';
					//	echo '</fieldset>';
					//echo '</form>';
				echo '</div>';
			}else{
				echo '<div class="pure-u-1 pure-u-sm-1-1">';
				echo '<p>404</p>';
				echo '</div>';
			}
		}
	// List 
	if(isset($selectedCity)) {
		function is_person_in_selected_location($person) {
			global $selectedCity;
			return $person['location'] == $selectedCity;
		}
		$locationPeople = array_filter($people, "is_person_in_selected_location");
		
			echo '<div class="pure-u-1">';
			echo '	<table class="l-box pure-table pure-table-horizontal">';
			echo '	<thead>';
			echo '		<tr>';
			echo '			<th>Namn</th>';
			echo '			<th>Titel</th>';
			echo '		</tr>';
			echo '	</thead>';
			echo '	<tbody>';
			foreach($locationPeople as $person) {
			echo '		<tr>';
			echo '			<td><a href="?qr=' . strtolower($person['name']) . '">' . $person['name'] . '</a></td>';
			echo '			<td>' . $person['role'] . '</td>';
			echo '		</tr>';
			}
			echo '	</tbody>';
			echo '	</table>';
			echo '</div>';
			
			
	}
	?>
	</div>
	
	<div class="footer">
		<div class="pure-g">
		<div class="pure-u-1">
			<strong class="copyright"><a href="https://bsaab.se/" target="_new">Brandskyddsarbeten  AB</a></strong>
		</div>
		</div>
	</div>
	

	</div>
	</body>
</html>