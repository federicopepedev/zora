<x-admin-master>

	@section('content')

	<h1>Create Post</h1>

	<form action="{{route('post.store')}}" method="POST" enctype="multipart/form-data">
		@csrf
	<div class="form-group">
	   	<label for="title">Title:</label>
		<input type="text" id="title" name="title" class="form-control @error('title') is-invalid @enderror placeholder="Enter title">
			@error('title')
			<div class="invalid-feedback">{{$message}}</div>
		    @enderror
	</div>
	<div class="form-group">
		<label for="category_id">Categories:</label>
		<select class="form-control @error('category_id') is-invalid @enderror" name="category_id">
			        <option value="">--- Select Category ---</option>
                    @foreach ($categories as $category => $value)
                    <option value="{{ $category }}">{{ $value }}</option>
                    @endforeach
	    </select>
	    	@error('category_id')
			<div class="invalid-feedback">The category field is required.</div>
		    @enderror
    </div>
	<div class="form-group">
	   	<label for="file">Image:</label>
		<input type="file" id="post_image" name="post_image" class="form-control-file">
	</div>
	<div class="form-group">
		<label for="file">Body:</label>
		<textarea id="body" name="body" class="form-control @error('body') is-invalid @enderror" cols="30" rows="10"></textarea>
			@error('body')
			<div class="invalid-feedback">{{$message}}</div>
		    @enderror
	</div>

		<button type="submit" class="btn btn-primary">Submit</button>
	</form> 

	@endsection

</x-admin-master>