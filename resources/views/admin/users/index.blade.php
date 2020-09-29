<x-admin-master>
	
	@section('content')

	<h1>All Users</h1>

	@if(Session::has('user_deleted'))

	<div class="alert alert-danger">{{Session::get('user_deleted')}}</div>

	@endif

	          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Users</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>Username</th>
                      <th>Name</th>
                      <th>Avatar</th>
                      <th>Email</th>
                      <th>Created</th>
                      <th>Updated</th>
                      <th>Delete</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th>ID</th>
                      <th>Username</th>
                      <th>Name</th>
                      <th>Avatar</th>
                      <th>Email</th>
                      <th>Created</th>
                      <th>Updated</th>
                      <th>Delete</th>
                    </tr>
                  </tfoot>
                  <tbody>
                  	@foreach($users as $user)
                    <tr>
                      <td>{{$user->id}}</td>
                      <td><a href="{{route('user.profile.show', $user->id)}}">{{$user->username}}</a></td>
                      <td>{{$user->name}}</td>
                      <td><img src="{{$user->avatar}}" height="64"></td>
                      <td>{{$user->email}}</td>
                      <td>{{$user->created_at->diffForHumans()}}</td>
                      <td>{{$user->updated_at->diffForHumans()}}</td>
                      <td>
                        <form method="POST" action="{{route('user.destroy', $user->id)}}">
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

@endsection

@section('scripts')

  <!-- Page level plugins -->
  <script src="{{asset('vendor/datatables/jquery.dataTables.min.js')}}"></script>
  <script src="{{asset('vendor/datatables/dataTables.bootstrap4.min.js')}}"></script>

  <!-- Page level custom scripts -->
  <script src="{{asset('js/demo/datatables-demo.js')}}"></script>

@endsection

</x-admin-master>