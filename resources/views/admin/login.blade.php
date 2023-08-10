<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Register</title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
<style type="text/css">
	body{
		background: #c8e1f7;
	}
</style>
</head>

<body>
	<div class="container mt-5 p5">
		<div class="card">
			<div class="card-body">
				<div class="row">
					<div class="col-lg-7">
						<img src="assets/images/book.jpg" class="card-img-top">
					</div>

					<div class="col-lg-5">
						@if($errors->any())
						<div class="alert alert-danger">
							<ul>
								@foreach ($errors->all() as $error)
								<li>{{ $error}}</li>
								@endforeach
							</ul>
						</div>
						@endif
						@if (Session::has('status'))
							<div class="alert alert-warning" role="alert">
								{{Session::get('status')}}
							</div>
						@endif

						<form action="{{url('login')}}" method="post">
							@csrf
							<h3>Form Login</h3>
							<hr>

							<label for="email">Email</label>
							<input type="email" name="email" class="form-control">

							<label for="password">Password</label>
							<input type="password" name="password" class ="form-control">

							
							<input type="submit" name="submit" class="btn btn-md btn-primary" value="Login">
							<a href="register" class="btn btn-warning">Register</a>


						</form>
					</div>
				</div>
			</div>
		</div>
	</div>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

</body>
</html>