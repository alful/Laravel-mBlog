@extends('admin.app')

@section('css')
<style>
	.menu-link{
		color: black;
	}
	.menu-link:hover{
		text-decoration: none;
	}
</style>
@endsection

@section('content')
@if (Session::has('status'))
	<div class="alert alert-warning" role="alert">
		{{Session::get('status')}}
	</div>
	
@endif
<h2>Dashboard</h2>
<hr>

<p>Halo, Selamat datang di CMS BLOG</p>
@endsection