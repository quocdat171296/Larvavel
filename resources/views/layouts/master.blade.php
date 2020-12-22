<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>DatNguyen</title>
	<link rel="shortcut icon" type=""
	href="{{asset('img/boy.png')}}" />
	<link rel="stylesheet" href="{{asset('css/style.css')}}">
</head>
<body>
	<div class="bg-layout">
		<div class="content-website">
			@include('layouts.header')
			<div id="content">
				<h1>Đạt Nguyễn</h1>
				<h1>Laravel Framework 8.15.0</h1>
				@yield('NoiDung')
			</div>
			@include('layouts.footer')
		</div>
	</div>
</body>
</html>