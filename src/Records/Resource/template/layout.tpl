{*<!doctype html>*}
<html>
	<head>
		<title>GPS Lokalizacja</title>
		<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
		{headLink()->appendStyleSheet($baseUrl . '/resource/records/dtpicker/jquery.simple-dtpicker.css')}
		{headLink()}
		{headScript()->appendFile($baseUrl . '/resource/records/dtpicker/jquery.simple-dtpicker.js')}
		{headScript()}
		<style>
			table, th, td {
				border: 1px solid black;
			}
		</style>
	</head>
	<body>
		{content()}
	</body>
</html>