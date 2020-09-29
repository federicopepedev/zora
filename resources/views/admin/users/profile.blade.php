<x-admin-master>

	@section('content')

	<h1>{{$user->username}} Profile</h1>

	<div class="row">
		<div class="col-sm-6">
			<form method="POST" action="{{route('user.profile.update', $user)}}" enctype="multipart/form-data">
				@csrf
				@method('PUT')

				<div class="form-group">
					<img width="120" class="img-profile rounded-circle" src="{{$user->avatar}}">
				</div>

				<div class="form-group">
					<input type="file" name="avatar">
				</div>

				<div class="form-group">
					<label for="username">Username</label>
					<input type="text" id="username" name="username" class="form-control @error('username') is-invalid @enderror" value="{{$user->username}}">
					
					@error('username')
					<div class="invalid-feedback">{{$message}}</div>
					@enderror

				</div>


				<div class="form-group">
					<label for="name">Name</label>
					<input type="text" id="name" name="name" class="form-control @error('name') is-invalid @enderror" value="{{$user->name}}">

					@error('name')
					<div class="invalid-feedback">{{$message}}</div>
					@enderror

				</div>

				<div class="form-group">
					<label for="email">Email</label>
					<input type="text" id="email" name="email" class="form-control @error('email') is-invalid @enderror" value="{{$user->email}}">

					@error('email')
					<div class="invalid-feedback">{{$message}}</div>
					@enderror

				</div>

				<div class="form-group">
					<label for="password">Password</label>
					<input type="password" id="password" name="password" class="form-control @error('password') is-invalid @enderror">

					@error('password')
					<div class="invalid-feedback">{{$message}}</div>
					@enderror

				</div>

				<div class="form-group">
					<label for="password-confirmation">Confirm Password</label>
					<input type="password" id="password-confirmation" name="password-confirmation" class="form-control @error('password-confirmation') is-invalid @enderror">

					@error('password-confirmation')
					<div class="invalid-feedback">{{$message}}</div>
					@enderror

				</div>

				<button type="submit" class="btn btn-primary">Submit</button>
				
			</form>
		</div>
	</div>

	<div class="row">
		<div class="col-sm-12">
			    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Options</th>
                      <th>ID</th>
                      <th>Name</th>
                      <th>Slug</th>
                      <th>Attach</th>
                      <th>Detach</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th>Options</th>
                      <th>ID</th>
                      <th>Name</th>
                      <th>Slug</th>
                      <th>Attach</th>
                      <th>Detach</th>
                    </tr>
                  </tfoot>
                  <tbody>
                  	@foreach($roles as $role)
                    <tr>
                      <td><input type="checkbox"
                      	@foreach($user->roles as $user_role)

                      	@if($user_role->slug == $role->slug)
                      	checked
                      	@endif

                      	@endforeach
                      	></td>
                      <td>{{$role->id}}</td>
                      <td>{{$role->name}}</td>
                      <td>{{$role->slug}}</td>
                      <td>

                      	<form method="POST" action="{{route('user.role.attach', $user)}}">
                      		@method('PUT')
                      		@csrf

                      		<input type="hidden" name="role" value="{{$role->id}}">
                      	    <button 
                      	    class="btn btn-primary"


                      	    @if($user->roles->contains($role))

                      	    disabled

                      	    @endif

                      	    >Attach</button>
                        </form>

                      </td>
                      <td>

                      	<form method="POST" action="{{route('user.role.detach', $user)}}">
                      		@method('PUT')
                      		@csrf

                      		<input type="hidden" name="role" value="{{$role->id}}">
                      	    <button class="btn btn-danger"

                      	    @if(!$user->roles->contains($role))

                      	    disabled

                      	    @endif


                      	    >Detach</button>
                        </form>

                      </td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
		</div>
	</div>


	@endsection
</x-admin-master>