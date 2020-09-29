<x-admin-master>

	@section('content')

	@if(auth()->user()->userHasRole('Admin'))

	<h1 class="h3 mb-4 text-gray-800">Dashboard</h1>

	<div class="row">

            <!-- Users Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <a href="{{route('users.index')}}" class="text-decoration-none">
              <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Users</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">{{$users}}</div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-users fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
              </a>
            </div>

            <!-- Posts Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <a href="{{route('post.index')}}" class="text-decoration-none">
              <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Posts</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">{{$posts}}</div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-book fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
              </a>
            </div>

            <!-- Comments Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <a href="{{route('comments.index')}}" class="text-decoration-none">
              <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Comments</div>
                      <div class="row no-gutters align-items-center">
                        <div class="col-auto">
                          <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">{{$comments}}</div>
                        </div>
                      </div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-comments fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
              </a>
            </div>

            <!-- Pending Requests Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <a href="{{route('categories.index')}}" class="text-decoration-none">
              <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Categories</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">{{$categories}}</div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-list fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </a>
            </div>
    </div>

	@endif

	@endsection

</x-admin-master>