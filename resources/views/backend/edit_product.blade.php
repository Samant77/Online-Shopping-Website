@extends('backend.layout.app')

@section('content')

<section class="content-header">					
    <div class="container-fluid my-2">
    <div class="row mb-2">
    <div class="col-sm-6">
    <h1> # Edit Product</h1>
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
    <form action="{{route('product-update',$product->id)}}" method="post" enctype="multipart/form-data">
        @method('PUT')
@csrf

    <div class="container-fluid">
    <div class="row">
    <div class="col-md-8">
    <div class="card mb-3">
    <div class="card-body">								
    <div class="row">
    <div class="col-md-12">
    <div class="mb-3">
    <label for="title">Title</label>
    <input type="text" name="title" id="title" class="form-control" placeholder="Title" value="{{ $product->title }}">	
    </div>
    </div>

    <div class="col-md-12">
        <div class="mb-3">
        <label for="slug">Slug</label>
        <input type="text" name="slug" id="slug" class="form-control" placeholder="Slug" value="{{ $product->slug }}">	
        </div>
        

        </div>

        <div class="col-md-12">
            <div class="mb-3">
            <label for="short_description">Short Description</label>
            <textarea name="short_description" id="description" cols="30" rows="10" class="summernote" placeholder="short_description" value="{!! htmlspecialchars_decode($product->short_description) !!}"></textarea>
            </div>
            </div> 

    <div class="col-md-12">
    <div class="mb-3">
    <label for="description">Description</label>
    <textarea name="description" id="description" cols="30" rows="10" class="summernote" placeholder="Description" value="{!! htmlspecialchars_decode($product->description) !!}"></textarea>
    </div>
    </div> 
    


        <div class="col-md-12">
            <div class="mb-3">
            <label for="shipping_return">Shipping Return</label>
            <textarea name="shipping_return" id="shipping_return" cols="30" rows="10" class="summernote" placeholder="shipping_return" value="{!! htmlspecialchars_decode($product->shipping_return) !!}"></textarea>
            </div>
            </div> 



    </div>
    </div>	                                                                      
    </div>
    <div class="card mb-3">
    <div class="card-body">
    <h2 class="h4 mb-3">Media</h2>								
    <div id="image" class="dropzone dz-clickable">
    <div class="dz-message needsclick">    
    <input type="file"  class="mt-4 ml-5" name="images[]" multiple  value="{{ old('image_path', $product->image_path) }}">
        <br><br>                                            
    </div>
    </div>
    </div>	                                                                      
    </div>
    <div class="card mb-3">
    <div class="card-body">
    <h2 class="h4 mb-3">Pricing</h2>								
    <div class="row">
    <div class="col-md-12">
    <div class="mb-3">
    <label for="price">Price</label>
    <input type="text" name="price" id="price" class="form-control" placeholder="Price"value="{{ $product->price }}">	
    </div>
    </div>
    <div class="col-md-12">
    <div class="mb-3">
    <label for="compare_price">Compare at Price</label>
    <input type="text" name="compare_price" id="compare_price" class="form-control" placeholder="Compare Price" value="{{ $product->compare_price }}">
    <p class="text-muted mt-3">
    To show a reduced price, move the product’s original price into Compare at price. Enter a lower value into Price.
    </p>	
    </div>
    </div>                                            
    </div>
    </div>	                                                                      
    </div>



    <div class="card mb-3">
    <div class="card-body">
    <h2 class="h4 mb-3">Inventory</h2>								
    <div class="row">
    <div class="col-md-6">
    <div class="mb-3">
    <label for="sku">SKU (Stock Keeping Unit)</label>
    <input type="text" name="sku" id="sku" class="form-control" placeholder="sku" value="{{ $product->sku }}">	
    </div>
    </div>
    <div class="col-md-6">
    <div class="mb-3">
    <label for="barcode">Barcode</label>
    <input type="text" name="barcode" id="barcode" class="form-control" placeholder="Barcode" value="{{ $product->barcode}}">	
    </div>
    </div>
       

    {{-- <div class="col-md-12">
    <div class="mb-3">
    <div class="custom-control custom-checkbox">
    <input class="custom-control-input" type="checkbox" id="track_qty" name="track_qty" checked>
    <label for="track_qty" class="custom-control-label">Track Quantity</label>
    </div>
    </div>
    <div class="mb-3">
    <input type="number" min="0" name="qty" id="qty" class="form-control" placeholder="Qty">	
    </div>
    </div>      --}}
    

    <div class="col-md-6">
        <div class="mb-3">
        <label for="qty">Quentity</label>
        <input type="text" name="qty" id="qty" class="form-control" placeholder="Quentity" value="{{ $product->qty }}">	
        </div>
        </div>
    
    </div>
    </div>	                                                                      
    </div>

    <div class="card mb-3">
        <div class="card-body">	
        <h2 class="h4 mb-3">Related Product</h2>
        <div class="mb-3 ">
        <select name="related_products[]" id="related_products" class="related-product w-100" multiple>

        @if(!empty($relatedProducts))
            @foreach ($relatedProducts as $relProduct )
                <option selected value="{{$relProduct->id}}">{{$relProduct->title}}</option>
            @endforeach
        @endif                                                    
        </select>
        </div>
        </div>
        </div>
    
    </div>


    <div class="col-md-4">
    <div class="card mb-3">
    <div class="card-body">	
    <h2 class="h4 mb-3">Product status</h2>
    <div class="mb-3">
    <select name="status" id="status" class="form-control">
        <option value="active" {{ $product->status == 'active' ? 'selected' : '' }}>Active</option>
		<option value="inactive" {{ $product->status == 'inactive' ? 'selected' : '' }}>Block</option>
    </select>
    </div>
    </div>
    </div> 

    <div class="card">
    <div class="card-body">	
    <h2 class="h4  mb-3">Product category</h2>
    <div class="mb-3">
    <label for="category_id">Category</label>
    <select name="category_id" id="category_id" class="form-control">
        @if ( $categories->isNotEmpty())
        @foreach ($categories as $category )
        
        @if ($categories === 'active' || $category->status === 'active')

        <option value="{{$category->id}}">{{$category->name}}</option>
        @endif
        @endforeach
        @endif

    </select>
    </div>


    <div class="mb-3">
    <label for="subcategory_id">Sub category</label>
    <select name="subcategory_id" id="subcategory_id" class="form-control">
        @if ( $subcategories->isNotEmpty())
        @foreach ($subcategories as $subcategory )
        @if ($subcategories === 'active' || $subcategory->status === 'active')

        <option value="{{$subcategory->id}}">{{$subcategory->name}}</option>
        @endif
        @endforeach
        @endif
    </select>
    </div>
    </div>
    </div> 
    <div class="card mb-3">
    <div class="card-body">	
    <h2 class="h4 mb-3">Product brand</h2>
    <div class="mb-3">
    <select name="brand_id" id="brand_id" class="form-control">
        @if ( $brands->isNotEmpty())
        @foreach ($brands as $brand )

        @if ($brands === 'active' || $brand->status === 'active')

        <option value="{{$brand->id}}">{{$brand->name}}</option>

        @endif

        @endforeach
        @endif
    </select>
    </div>
    </div>
    </div> 
    
    <div class="card mb-3">
    <div class="card-body">	
    <h2 class="h4 mb-3">Featured product</h2>
    <div class="mb-3">
    <select name="is_feature" id="is_feature" class="form-control">
        <option value="active">Yes</option>
        <option value="inactive">No</option>                                                                    
    </select>
    </div>
    </div>
    </div>    
    
{{--     
    <div class="card mb-3">
        <div class="card-body">	
        <h2 class="h4 mb-3">Related Product</h2>
        <div class="mb-3 ">
        <select name="related_products[]" id="related_products" class="related-product w-100" multiple>

        @if(!empty($relatedProducts))
            @foreach ($relatedProducts as $relProduct )
                <option selected value="{{$relProduct->id}}">{{$relProduct->title}}</option>
            @endforeach
            
            @else
        @endif                                                    
        </select>
        </div>
        </div>
        </div>
     --}}

    










        
    </div>
    </div>
    
    <div class="pb-5 pt-3">
    <button class="btn btn-primary" type="submit">Update Product</button>
    <a href="{{url('admin/product')}}" class="btn btn-outline-dark ml-3">Cancel</a>
    </div>
    </div>
</form>
    <!-- /.card -->
    </section>
    
@endsection


@section('customJs')


{{-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> --}}

{{-- <script src="{{ asset('node_modules/jquery/dist/jquery.min.js') }}"></script> --}}

{{-- <script>
    $(document).ready(function() {
        $('#category_id').change(function() {
            var categoryId = $(this).val();
            $.ajax({
                url: "{{ route('subcategories.get') }}",
                method: 'GET',
                data: { category_id: categoryId },
                success: function(data) {
                    $('#subcategory_id').empty(); // Clear existing options
                    $('#subcategory_id').append($('<option>', { value: '', text: 'Select Subcategory' }));
                    $.each(data, function(key, value) {
                        $('#subcategory_id').append($('<option>', { value: value.id, text: value.name }));
                    });
                }
            });
        });
    });
</script> --}}

<script>

$('.related-product').select2({
    ajax: {
        url: '{{ route("products.getProducts") }}',
        dataType: 'json',
        tags: true,
        multiple: true,
        minimumInputLength: 3,
        processResults: function (data) {
            return {
                results: data.tags
            };
        }
    }
}); 
    
    $(document).ready(function() {
        // Define function to fetch subcategories
        function fetchSubcategories(categoryId) {
            $.ajax({
                url: "{{ route('subcategories.get') }}",
                method: 'GET',
                data: { category_id: categoryId },
                success: function(data) {
                    $('#subcategory_id').empty(); // Clear existing options
                    $('#subcategory_id').append($('<option>', { value: '', text: 'Select Subcategory' }));
                    $.each(data, function(key, value) {
                        $('#subcategory_id').append($('<option>', { value: value.id, text: value.name }));
                    });
                }
            });
        }

        // Initially fetch subcategories based on the selected category
        var initialCategoryId = $('#category_id').val();
        fetchSubcategories(initialCategoryId);

        // Change event handler for category select
        $('#category_id').change(function() {
            var categoryId = $(this).val();
            fetchSubcategories(categoryId);
        });
    });
</script>
<style>
    .select2-container--default .select2-selection--multiple .select2-selection__rendered li{
  color:rgb(5, 0, 0);

 
}


</style>
@endsection