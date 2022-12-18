<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>{{ $page['title'] ?? $title ?? '' }}</title>
	<link rel="stylesheet" href="/adminlte/css/adminlte.min.css">
	<style>
		:root, html, body {font-size: 12px}
	</style>
	@stack('styles')
</head>
<body>
	<?php 
	// $segments = request()->segments();
	// $xtype = strtolower($segments[count($segments)-2]);
	?>
	
	<div class="container-fluid">
		<div class="w-100 d-flex justify-content-center mb-3">
			<img src="/pdf/img/kop.png" alt="kop surat" width="90%">
		</div>

		<h1 class="text-center"> {{ $title ?? $page['title'] ?? '' }} </h1>
		<br>
		@include('admin.pages.laporan.'.$bigtype, ['type' => $type, 'variant' => 'cetak', 'laporan' => $laporan])
	</div>
	<script defer>
		window.onload = () => window.print()
	</script>
</body>
</html>