<x-admin-master>

	@section('content')

	<h1>Categories</h1>

	@if(Session::has('category_deleted'))

	<div class="alert alert-danger">{{Session::get('category_deleted')}}</div>

	@endif

	<div class="row">

		<div class="col-sm-3">

			<form method="POST" action="{{route('categories.store')}}">
				@csrf

				<div class="form-group">
					<label for="name">Name</label>
					<input type="text" id="name" name="name" class="form-control @error('name') is-invalid @enderror">
        
          @error('name')
           <div class="invalid-feedback">{{$message}}</div>
          @enderror

				</div>

				<button type="submit" class="btn btn-primary btn-block">Create</button>
				
			</form>

		</div>

		<div class="col-sm-9">

		   <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Categories</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>Name</th>
                      <th>Slug</th>
                      <th>Delete</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th>ID</th>
                      <th>Name</th>
                      <th>Slug</th>
                      <th>Delete</th>
                    </tr>
                  </tfoot>
                  <tbody>
                  	@foreach($categories as $category)
                    <tr>
                    	<td>{{$category->id}}</td>
                    	<td><a href="{{route('categories.edit', $category->id)}}"> {{$category->name}}</a></td>
                    	<td>{{$category->slug}}</td>
                    	<td>
                    		<form method="POST" action="{{route('categories.destroy', $category->id)}}">
                          @csrf
                          @method('DELETE')

                          <button class="btn btn-danger">Delete</button>

                        </form>
                    	</td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
            </div>
           </div>

		</div>


		
	</div>

	@endsection

</x-admin-master>