<x-admin-master>

	@section('content')

	<h1>Edit Post</h1>

	<form action="{{route('post.update', $post->id)}}" method="POST" enctype="multipart/form-data">
		@csrf
		@method('PATCH')
	<div class="form-group">
	   	<label for="title">Title:</label>
		<input type="text" id="title" name="title" class="form-control" placeholder="Enter title" value="{{$post->title}}">
	</div>
	<div class="form-group">
		<div><img src="{{$post->post_image}}" width="400"></div>
	   	<label for="file">Image:</label>
		<input type="file" id="post_image" name="post_image" class="form-control-file">
	</div>
	<div class="form-group">
		<textarea id="body" name="body" class="form-control" cols="30" rows="10">{{$post->body}}</textarea>
	</div>

		<button type="submit" class="btn btn-primary">Submit</button>
	</form> 

	@endsection

</x-admin-master>