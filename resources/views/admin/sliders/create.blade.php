@extends('admin.app')
@section('content')
    <h3>Create Slider</h3>
    <hr>
    <div class="col-lg-6">
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error )
                    <li>{{$error}}</li>
                    
                @endforeach
            </ul>
        </div>
        @endif


        <form action="{{url('admin/sliders/create')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <label for="title">Title</label>
            <input type="text" name="title" class="form-control">
            <label for="category">Category</label>
            <select class="form-control" name="category_id" id="category">
                @foreach ($categ as $cat)
                    <option value="{{$cat->id}}">{{$cat->name}}</option>
                @endforeach
            </select>
            <label for="image">Image</label>
			<input type="file" name="image" class="form-control">
			<label for="url">URL</label>
			<input type="text" name="url" class="form-control">
			<label for="order">Order</label>
			<input type="number" name="order" class="form-control">
			<label for="Status">Status</label>
			<select class="form-control" name="status" id="status">
				<option value="1">Publish</option>
				<option value="0">Tidak Publish</option>
			</select>
			<br>
            
            

            <input type="submit" name="submit" class="btn btn-md btn-primary" value="Tambah Data">
            <a href="{{url('admin/sliders')}}" class="btn btn-md btn-warning"><i class="fas fa-chevron-circle-left"></i>Kembali</a>
        </form>
    </div>

@endsection


