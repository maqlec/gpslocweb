<div>
	{$form->start()}
	{$form->getElement('devices')}
	<input class="datepicker" type="text" name="records-form-pickform[dateFrom]" value="{$form->getElement('dateFrom')->getValue()}">
	<input class="datepicker" type="text" name="records-form-pickform[dateTo]" value="{$form->getElement('dateTo')->getValue()}">
	{$form->getElement('submit')}
	{$form->end()}
</div>
<script>
$( function() {
  $( ".datepicker").datepicker();
	});
</script>

<div class="container">
	<h1>Lokalizacja z FM2200</h1>
	<div id="map-canvas" style="width:1200px;height:600px"></div>
</div>
<script src="{$baseUrl}/resource/records/js/default.js"></script>
<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&key=AIzaSyC-eMiZe3gl7ZQLBx5i5-N41Y7Xex6Vml8&callback=initialize"></script>
