<x-admin-master>
	
	@section('content')

	<h1>All Replies</h1>

  @if(count($replies) > 0)

	          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Replies</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>Author</th>
                      <th>Body</th>
                      <th>Active</th>
                      <th>Delete</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th>ID</th>
                      <th>Author</th>
                      <th>Body</th>
                      <th>Active</th>
                      <th>Delete</th>
                    </tr>
                  </tfoot>
                  <tbody>
                  	@foreach($replies as $reply)
                    <tr>
                      <td>{{$reply->id}}</td>
                      <td>{{$reply->user->name}}</td>
                      <td>{{$reply->body}}</td>
                      <td>
                        @if($reply->is_active == 1)
                        <form method="POST" action="{{route('replies.update', $reply->id)}}">
                          @csrf
                          @method('PUT')
                          <input type="hidden" name="is_active" value="0">
                          <button type="submit" class="btn btn-warning">Un-approve</button>
                        </form>
                        @else
                         <form method="POST" action="{{route('replies.update', $reply->id)}}">
                          @csrf
                          @method('PUT')
                          <input type="hidden" name="is_active" value="1">
                          <button type="submit" class="btn btn-success">Approve</button>
                        </form>
                        @endif
                      </td>
                      <td>
                        <form method="post" action="{{route('replies.destroy', $reply->id)}}">
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
@else

<h2 class="text-center">No replies</h2>

@endif


@endsection

@section('scripts')

  <!-- Page level plugins -->
  <script src="{{asset('vendor/datatables/jquery.dataTables.min.js')}}"></script>
  <script src="{{asset('vendor/datatables/dataTables.bootstrap4.min.js')}}"></script>

  <!-- Page level custom scripts -->
  <script src="{{asset('js/demo/datatables-demo.js')}}"></script>

@endsection

</x-admin-master>