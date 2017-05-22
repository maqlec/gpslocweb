<a href="{@module=records&controller=index&action=logout@}">wyloguj</a>
<div class="left">
	{$form->start()}
	{$form->getElement('imei')}
	<input id="datepickerFrom" type="text" name="records-form-pickform[dateFrom]" value="{$form->getElement('dateFrom')->getValue()}">
	<input id="datepickerTo" type="text" name="records-form-pickform[dateTo]" value="{$form->getElement('dateTo')->getValue()}">
	{$form->getElement('submit')}
	<a href="{@module=records&controller=index&action=index@}">live</a>
	{$form->end()}
<script>
	$(function () {
		$("#datepickerFrom").appendDtpicker();
		$("#datepickerTo").appendDtpicker();
	});
</script>

{if $records|count}
<table>
	<tr>
		<th>#</th>
		<th>Czas</th>
		<th>Latitude</th>
		<th>Longitude</th>
	</tr>
	{$i = 1}
	{foreach $records as $record}
		<tr>
			<td>{$i}</td>
			<td>{$record->timestamp}</td>
			<td>{$record->latitude}</td>
			<td>{$record->longitude}</td>
		</tr>
		{$i++}
	{/foreach}
</table>
</div>
{else}
	<div>Nie znaleziono żadnych punktów</div>
{/if}

<div class="right">
	<h1>Lokalizacja z FM2200</h1>
	<div id="map-canvas" style="width:1100px;height:600px"></div>
</div>
<script>
	window.points = {$json};
</script>
<script src="{$baseUrl}/resource/records/js/default.js"></script>
<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&key=AIzaSyC-eMiZe3gl7ZQLBx5i5-N41Y7Xex6Vml8&callback=initialize"></script>

