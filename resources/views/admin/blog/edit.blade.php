{{-- layout extend --}}
@extends('layouts.contentLayoutMaster')

{{-- page title --}}
@section('title','Manage Blog')

{{-- vendor styles --}}
@section('vendor-style')
<link rel="stylesheet" type="text/css" href="{{ asset('vendors/dropify/css/dropify.min.css') }}">
@endsection

{{-- page styles --}}
@section('page-style')
@endsection

{{-- page content --}}
@section('content')
<div class="row">
  	<div class="col s12 m12 l12">
      <div class="section pb-0 pt-0">
        <div class="card border-radius-6">
          	<div class="card-content">
	            <div class="row">
	            	<form method="POST" action="{{ route('admin.blog.update', $article->id) }}" enctype="multipart/form-data">
		              	@csrf
		            	<div class="col s12 m12 l12">
		            		<span class="card-title left">Edit Article</span>
		            		<button class="btn deep-purple accent-2 waves-effect waves-light right" type="submit" name="action">Save changes
	          				</button>
	              			<a href="{{ route('admin.blog.index') }}" class="btn grey lighten-2 waves-effect waves-dark right mr-1" style="color: #555">Back
	          				</a>
		            	</div>
		              	<div class="col s12 m12 l12">
		              		<div class="row">
			              		<div class="col s12 m12 l12">
			              			<label>Article Image</label>
			              		</div>
			              		<div class="input-field col s12 m12 l12">
			              			<p>Maximum file upload size 2MB.</p>
							      	<input type="file" name="imageurl" id="input-file-now" class="dropify validate" data-default-file="{{ asset('images/articles/' . $article->imageurl . '') }}" value="{{$article->imageurl}}" />
							    </div>
			              	</div>
			              	<div class="row">
			              		<div class="input-field col s12 m6 l6">
					              	<input type="text" name="title" id="title" class="validate" value="{{$article->title}}" required>
					            	<label for="title">Article Name</label>
				              	</div>
				              	<div class="input-field col s12 m6 l6">
					                <select name="category_id" id="category">
					                	<option value="" disabled selected>Choose Category</option>
					                	@foreach($categories as $category)
						                	@if($article->category_id==$category->id)
						                	<option selected value="{{ $category->id }}">{{ $category->name }}</option>
						                	@else
						                	<option value="{{ $category->id }}">{{ $category->name }}</option>
						                	@endif
					                	@endforeach
					                </select>
					                <label for="category">Article Category</label>
				              	</div>
			              	</div>
			              	<div class="row">
			              		<div class="col s12 m12 l12">
			              			<label>Article Content</label>
			              		</div>
			              		<div class="col s12 m12 l12">
			              			<input id="content" value="{{$article->content}}" type="hidden" name="content">
										<trix-editor input="content"></trix-editor>
			              		</div>
			              	</div>
			              	<div class="row">
			              		<div class="col s12 m12 l12 mt-2">
			              			
			              		</div>
			              	</div>
		              	</div>
	              	</form>
	            </div>
          	</div>
        </div>
      </div>
  	</div>
</div>
@endsection

{{-- vendor scripts --}}
@section('vendor-script')
<script type="text/javascript" src="{{ asset('vendors/dropify/js/dropify.min.js') }}"></script>
@endsection

{{-- page scripts --}}
@section('page-script')
<script type="text/javascript">
	$(document).ready(function(){

		$('#category').formSelect();
		$('.dropify').dropify();

	});
</script>
@endsection

