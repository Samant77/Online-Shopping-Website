@extends('backend.layout.app')

@section('content')


<section class="content-header">					
<div class="container-fluid my-2">
<div class="row mb-2">
<div class="col-sm-6">
<h1># Edit Category</h1>
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
<form method="POST"  action="{{ route('brand-update', $brand->id) }}">
@csrf

@method('PUT')

<div class="card">
<div class="card-body">								
<div class="row">
<div class="col-md-6">
<div class="mb-3">
<label for="name">Name</label>
<input type="text" name="name" id="name" class="form-control" placeholder="Name" value="{{ $brand->name }}">	
</div>
</div>
<div class="col-md-6">
<div class="mb-3">
<label for="slug">Slug</label>
<input type="text" name="slug" id="slug" class="form-control" placeholder="Slug" value="{{ $brand->slug }}">	
</div>
</div>	

<div class="col-md-6">
	<div class="mb-3">
	<label for="status">Status</label>
	<select name="status" id="status" class="form-control">
		<option value="active" {{ $brand->status == 'active' ? 'selected' : '' }}>Active</option>
		<option value="inactive" {{ $brand->status == 'inactive' ? 'selected' : '' }}>Block</option>
	</select>
	</div>
	</div>	
</div>
</div>							
</div>
<div class="pb-5 pt-3">
<button class="btn btn-primary" type="submit">Update</button>
<a href="#" class="btn btn-outline-dark ml-3">Cancel</a>
</div>
</form>
</div>
<!-- /.card -->
</section>


@endsection

@section('customJs')
<script>
	

		
</script>
@endsection


 


	
