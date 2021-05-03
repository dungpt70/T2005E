@extends("layout.template")

@section("title", "Danh sách sách")
@section("content")
	
	<table class="table table-border">
		<tr>
			<th>STT</th>
			<th>Tên sách</th>
			<th>Tiêu đề</th>
			<th>Tác giả</th>
			<th>Giá</th>
			<th>Ngày phát hành</th>
			<th>Thao tác</th>
		</tr>
		@php 
		$i = 0;
		@endphp
		@foreach ( $dsbooks as $row )
			<tr>
				<td>{{++$i}}</td>
				<td>{{$row->name}}</td>
				<td>{{$row->title}}</td>
				<td>{{$row->author}}</td>
				<td>{{$row->price}}</td>
				<td>{{$row->publish}}</td>
				<td>{{$row->id}}</td>
			</tr>
		@endforeach
		@php
		//var_dump($dsbooks)
		@endphp
	</table>

@endsection