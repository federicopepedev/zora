<x-admin-master>

	@section('content')

	<h1>Roles</h1>

	@if(Session::has('role_deleted'))

	<div class="alert alert-danger">{{Session::get('role_deleted')}}</div>

	@endif

	<div class="row">

		<div class="col-sm-3">

			<form method="POST" action="{{route('roles.store')}}">
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
              <h6 class="m-0 font-weight-bold text-primary">Roles</h6>
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
                  	@foreach($roles as $role)
                    <tr>
                    	<td>{{$role->id}}</td>
                    	<td><a href="{{route('roles.edit', $role->id)}}"> {{$role->name}}</a></td>
                    	<td>{{$role->slug}}</td>
                    	<td>
                    		<form method="POST" action="{{route('roles.destroy', $role->id)}}">
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