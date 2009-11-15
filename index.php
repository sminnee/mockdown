<html>
<head>
	<title>Mockdown example</title>
	<style>
	.mockdown, .mockdown * {
		font-family: Monaco, Courier;
		font-size: 11px;
	}
	</style>

</head>

<body>
<h1>Mockdown example</h1>

<p>This example renders the file sample.mock.</p>

<?php

require('Mockdown.php');

echo Mockdown(file_get_contents('sample.mock'));

?>

</body>
</html>