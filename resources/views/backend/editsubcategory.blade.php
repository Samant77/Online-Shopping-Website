@extends('backend.layout.app')

@section('content')

<section class="content-header">					
	<div class="container-fluid my-2">
        
	<div class="row mb-2">
	<div class="col-sm-6">
	<h1># Edit Sub Category</h1>
	</div>
	<div class="col-sm-6 text-right">
	<a href="#" class="btn btn-primary">Back</a>
	</div>
	</div>
	</div>
	<!-- /.container-fluid -->
	</section>
	<!-- Main content -->
	<section class="content">
	<!-- Default box -->
	<div class="container-fluid">

<form method="POST"  action="{{route('subcategory-update', $subcategory->id)}}">
    @method('PUT')
    @csrf
	<div class="card">
	<div class="card-body">								
	<div class="row">
	<div class="col-md-12">
	<div class="mb-3">
	<label for="name">Category</label>
	<select name="category_id" id="category" class="form-control" >
        @if ( $categories->isNotEmpty())
        @foreach ($categories as $category )
		@if ($categories === 'active' || $category->status === 'active')
        <option value="{{$category->id}}">{{$category->name}}</option>
		@endif
        @endforeach
        @endif
        
	</select>
	</div>
	</div>
	<div class="col-md-6">
	<div class="mb-3">
	<label for="name">Name</label>
	<input type="text" name="name" id="name" class="form-control" placeholder="Name" value="{{ $subcategory->name }}">	
	</div>
	</div>
	<div class="col-md-6">
	<div class="mb-3">
	<label for="email">Slug</label>
	<input type="text" name="slug" id="slug" class="form-control" placeholder="Slug" value="{{ $subcategory->slug }}">	
	</div>
	</div>
    
    <div class="col-md-6">
        <div class="mb-3">
        <label for="status">Status</label>
        <select name="status" id="status" class="form-control">
            <option value="active"{{ $subcategory->status == 'active' ? 'selected' : '' }}>Active</option>
            <option value="inactive" {{ $subcategory->status == 'active' ? 'selected' : '' }}>Block</option>
        </select>
        </div>
        </div>	


		<div class="col-md-6">
			<div class="mb-3">
			<label for="showhome">Show on Home</label>
			<select name="showhome" id="showhome" class="form-control">
				<option value="active" {{ $category->status == 'active' ? 'selected' : '' }}>Yes</option>
				<option value="inactive" {{ $category->status == 'inactive' ? 'selected' : '' }}>No</option>
			</select>
			</div>
			</div>	

	</div>
	</div>							
	</div>
	<div class="pb-5 pt-3">
	<button class="btn btn-primary"  type="submit">Create</button>
	<a href="#" class="btn btn-outline-dark ml-3">Cancel</a>
	</div>
        </form>
	</div>
	<!-- /.card -->
	</section>


@endsection
