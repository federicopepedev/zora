<x-admin-master>
	
	@section('content')

	<h1>All Posts</h1>

	@if(Session::has('destroy_message'))

	<div class="alert alert-danger">{{Session::get('destroy_message')}}</div>

	@elseif(Session::has('store_message'))

	<div class="alert alert-success">{{Session::get('store_message')}}</div>

  @elseif(Session::has('update_message'))

  <div class="alert alert-success">{{Session::get('update_message')}}</div>

	@endif

	          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Posts</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>Author</th>
                      <th>Title</th>
                      <th>Category</th>
                      <th>Image</th>
                      <th>Comments</th>
                      <th>Created</th>
                      <th>Updated</th>
                      <th>Delete</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th>ID</th>
                      <th>Author</th>
                      <th>Title</th>
                      <th>Category</th>
                      <th>Image</th>
                      <th>Comments</th>
                      <th>Created</th>
                      <th>Updated</th>
                      <th>Delete</th>
                    </tr>
                  </tfoot>
                  <tbody>
                  	@foreach($posts as $post)
                    <tr>
                      <td>{{$post->id}}</td>
                      <td>{{$post->user->name}}</td>
                      <td><a href="{{route('post.edit', $post->id)}}">{{$post->title}}</a></td>
                      <td><a href="{{route('categories.edit', $post->category->id)}}">{{$post->category->name}}</a></td>
                      <td><img src="{{$post->post_image}}" height="64"></td>
                      <td><a href="{{route('comments.show', $post->id)}}">View Comments</a></td>
                      <td>{{$post->created_at->diffForHumans()}}</td>
                      <td>{{$post->updated_at->diffForHumans()}}</td>
                      <td>
                      	<form method="post" action="{{route('post.destroy', $post->id)}}">
                      		@csrf
                      		@method('DELETE')
                      		<button type="submit" class="btn btn-danger">Delete</button>
                      	</form>
                      </td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
            </div>
          </div>

@endsection

@section('scripts')

  <!-- Page level plugins -->
  <script src="{{asset('vendor/datatables/jquery.dataTables.min.js')}}"></script>
  <script src="{{asset('vendor/datatables/dataTables.bootstrap4.min.js')}}"></script>

  <!-- Page level custom scripts -->
  <script src="{{asset('js/demo/datatables-demo.js')}}"></script>

@endsection

</x-admin-master>