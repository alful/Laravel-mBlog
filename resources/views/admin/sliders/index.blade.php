@extends('admin.app')
@section('content')
	<h3>Sliders</h3>
	<hr>
	@if (Session::has('status'))
		<div class="alert alert-warning" role="alert">
			{{Session::get('status')}}
		</div>
		
	@endif
	<a href="{{ url('admin/sliders/create')}}" class="btn btn-md btn-primary mb-3"><i class="fas fa-plus"></i>Tambah Data</a>
	<table class="table table-bordered">
		<thead class="bg-primary text-light">
			<tr>
			<th>Title</th>
			<th>Image</th>
			<th>Url</th>
            <th>Order</th>
            <th>Status</th>
            <th>Action</th>
			</tr>
		</thead>
		@foreach ($data as $cat)
		<tr>
			<td>{{$cat->title}}</td>
			<td><img width="100px" src="{{url($cat->image)}}"></td>
			<td>{{$cat->url}}</td>
			<td>{{$cat->order}}</td>
			<td>{{$cat->status}}</td>
			<td>
				<a href="{{url ('admin/sliders/edit/'.$cat->id)}}" class="btn btn-primary btn-md"><i class="far fa-edit"></i>Edit</a>
				<a href="{{url ('admin/sliders/delete/'.$cat->id)}}" class="btn btn-danger btn-md"><i class="fas fa-trash"></i>Hapus</a>
			</td>
		</tr>	
		@endforeach
	</table>
@endsection