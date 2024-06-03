@extends('backend.layout.app')

@section('content')


<section class="content-header">					
<div class="container-fluid my-2">
<div class="row mb-2">
<div class="col-sm-6">
<h1>Create Category</h1>
</div>
<div class="col-sm-6 text-right">
<a href="{{url('admin/categories')}}" class="btn btn-primary">Back</a>
</div>
</div>
</div>
<!-- /.container-fluid -->
</section>
<!-- Main content -->
<section class="content">
<!-- Default box -->
<div class="container-fluid">
<form method="POST"  action="{{route('categories.store')}}" enctype="multipart/form-data">
@csrf
<div class="card">
<div class="card-body">								
<div class="row">
<div class="col-md-6">
<div class="mb-3">
<label for="name">Name</label>
<input type="text" name="name" id="name" class="form-control" placeholder="Name">	
</div>
</div>

<div class="col-md-6">
<div class="mb-3">
<label for="slug">Slug</label>
<input type="text" name="slug" id="slug" class="form-control" placeholder="Slug">	
</div>
</div>	

<div class="col-md-6">
	<div class="mb-3">
	<label for="image">Image</label>
	<input type="file" name="image_path" id="image" class="form-control" placeholder="Upload Image">	
	</div>
	</div>


<div class="col-md-6">
	<div class="mb-3">
	<label for="status">Status</label>
	<select name="status" id="status" class="form-control">
		<option value="active">Active</option>
		<option value="inactive">Block</option>
	</select>
	</div>
	</div>	

	<div class="col-md-6">
		<div class="mb-3">
		<label for="showhome">Show on Home</label>
		<select name="showhome" id="showhome" class="form-control">
			<option value="active">Yes</option>
			<option value="inactive">No</option>
		</select>
		</div>
		</div>	

</div>
</div>							
</div>
<div class="pb-5 pt-3">
<button class="btn btn-primary" type="submit">Create</button>
<a href="#" class="btn btn-outline-dark ml-3">Cancel</a>
</div>
</form>
</div>
<!-- /.card -->
</section>


@endsection

@section('customJs')
<script>
	// $('#categoryForm').submit(function(event){
	// 	event.preventDefault();
	// 	var element = $(this);
	// 	$.ajax({
	// 		url: '{{route("categories.store")}}';
	// 		type: 'POST';
	// 		data: element.serializeArray();
	// 		datatype: 'json';
	// 		success: function(response){

	// 		},error: function(jqXHR, exception){
	// 			console.log("something went wron !!");
	// 		}


	// 	})
	// });
		

		
</script>
@endsection

{{-- <script>
    
	$('#categoryFrom').submit(function(event){
		event.preventDefault();
		var element = $(this);
		$.ajax({
			url: '{{route("categories.store")}}';
			type: 'post';
			data: element.serializeArray();
			datatype: 'json';
			success: function(response){

			},error: function(jqXHR, exception){
				console.log("something went wron !!");
			}


		})
	});
		

</script> --}}



 


	

