<?php

$entity = "Other";
if (isset($_GET['entity'])) {
	$entity = $_GET['entity'];
}

$track = "";
if (isset($_GET['track'])) {
	$track = $_GET['track'];
}

include_once "base.php";

?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<!-- Required meta tags-->
	<!-- Google Tag Manager -->
	<script>
		(function(w, d, s, l, i) {
			w[l] = w[l] || [];
			w[l].push({
				'gtm.start': new Date().getTime(),
				event: 'gtm.js'
			});
			var f = d.getElementsByTagName(s)[0],
				j = d.createElement(s),
				dl = l != 'dataLayer' ? '&l=' + l : '';
			j.async = true;
			j.src =
				'https://www.googletagmanager.com/gtm.js?id=' + i + dl;
			f.parentNode.insertBefore(j, f);
		})(window, document, 'script', 'dataLayer', 'GTM-TX6XMML');
	</script>
	<!-- End Google Tag Manager -->
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="AIESEC Global Talent Sign Up">

	<script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
	<script src="https://www.google.com/recaptcha/api.js" async defer></script>
	<!-- Title Page-->
	<title><?= $product_name ?> Sign Up</title>
	<BASE href="<?= $base ?>">
	<link rel="shortcut icon" type="image/png" href="assets/favicon.png" />
	<!-- Icons font CSS-->
	<link href="vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">
	<link href="vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
	<!-- Font special for pages-->
	<link href="https://fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

	<!-- Vendor CSS-->
	<link href="vendor/select2/select2.min.css" rel="stylesheet" media="all">
	<style>
		body {
			background-image: url("assets/<?= $background ?>");
			background-size: auto 120%;
			background-color: white;
			background-repeat: no-repeat;
			background-position: center top;
		}
	</style>
	<!-- Main CSS-->
	<link href="css/main.css" rel="stylesheet" media="all">
</head>

<body>
	<!-- Google Tag Manager (noscript) -->
	<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-TX6XMML" height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
	<!-- End Google Tag Manager (noscript) -->

	<div class="page-wrapper font-poppins" style="padding-top:80px">
		<center><img src="assets/<?= $logo ?>" alt="Smiley face" class="responsive" style="width:300px;"> </center><br><br>
		<div class="wrapper wrapper--w960">
			<div class="card card-4">
				<iframe id="idIframe" scrolling="no" style="width:100%; overflow:hidden" frameBorder="0" src="volunteer_frame.php?product_name_up=<?= urlencode($product_name_up) ?>&color=<?= urlencode($color) ?>&entity=<?= urlencode($entity) ?>&track=<?= urlencode($track) ?>&product=<?= urlencode($product) ?>">
				</iframe>
			</div>

			<script type="text/javascript">
				window.addEventListener('message', event => {
					var iFrameID = document.getElementById('idIframe');
					iFrameID.height = event.data + "px";
				});
			</script>

		</div>
		<br><br><br><br>

	</div>

</body>

</html>