<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Strict//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Laravel Demo</title>
</head>
<body>
	<h1>Laravel Demo</h1>
	<?php echo "Tên lớp: $name; tên trường: $school";?>
	<h3>Tên lớp {{$name}}; tên trường: {{$school}}</h3>
	@php
		echo "Tên lớp: $name; tên trường: $school";
		var_dump($languages);
	@endphp
	<ul>
	@foreach($languages as $lang)
		@if ($lang == "PHP")
			<li style="color:red;"><a href="/ngon-ngu/{{$lang}}">{{$lang}}</a></li>
		@else
			<li><a href="/ngon-ngu/{{$lang}}">{{$lang}}</a></li>
		@endif
	@endforeach
	</ul>
</body>
</html>