<x-home-master>

	@section('content')

        <!-- Title -->
        <h1 class="mt-4">{{$post->title}}</h1>

        <!-- Author -->
        <p class="lead">
          by
          <a href="#">{{$post->user->name}}</a>
        </p>

        <hr>

        <!-- Date/Time & Category -->
        <p>Posted on {{$post->created_at->diffForHumans()}} <span class="float-right">Category: <a href="#">{{$post->category->name}}</a></span></p>

        <hr>

        <!-- Preview Image -->
        <img class="img-fluid rounded" src="{{$post->post_image}}" alt="">

        <hr>

        <!-- Post Content -->

        <p>{{$post->body}}</p>

        <hr>

        @if(Auth::check())

        @if(Session::has('store_comment'))

        <div class="alert alert-success">{{Session::get('store_comment')}}</div>

        @endif

        <!-- Comments Form -->
        <div class="card my-4">
          <h5 class="card-header">Leave a Comment:</h5>
          <div class="card-body">
            <form action="{{route('comments.store')}}" method="POST" enctype="multipart/form-data">
              @csrf

              <input type="hidden" name="post_id" value="{{ $post->id }}" />
              
              <div class="form-group">
                <textarea id="body" name="body" class="form-control @error('body') is-invalid @enderror" rows="3"></textarea>
                @error('body')
                <div class="invalid-feedback">The field is required.</div>
                @enderror
              </div>
              <button type="submit" class="btn btn-primary">Submit</button>
            </form>
          </div>
        </div>

        @endif

        <!-- Single Comment -->

        @if(count($comments) > 0)

        @foreach($comments as $comment)

        <div class="media mb-4">
          <img class="d-flex mr-3 rounded-circle" src="{{$comment->user->avatar}}" height="60" alt="">
          <div class="media-body">
            <h5 class="mt-0">{{$comment->user->name}}</h5>
            {{$comment->body}}

           @if(count($comment->replies) > 0)

           @foreach($comment->replies as $reply)

           @if($reply->is_active == 1)

           <!-- Nested Comment -->
            <div class="media mt-4">
              <img class="d-flex mr-3 rounded-circle" src="{{$reply->user->avatar}}" height="50" alt="">
              <div class="media-body">
                <h5 class="mt-0">{{$reply->user->name}}</h5>
                {{$reply->body}}

              </div>
            </div>

            @endif

            @endforeach

            @endif

            @if(Auth::check())

            <p class="pt-3">
              <a class="btn btn-primary" data-toggle="collapse" href="#collapse{{$comment->id}}" role="button" aria-expanded="false" aria-controls="collapseExample">Reply</a>
            </p>

            <form class="collapse" id="collapse{{$comment->id}}" action="{{route('replies.store')}}" method="POST" enctype="multipart/form-data">
              @csrf

              <input type="hidden" name="comment_id" value="{{ $comment->id }}" />
              
              <div class="form-group">
                <textarea id="body_reply" name="body_reply" class="form-control @error('body_reply') is-invalid @enderror" rows="1"></textarea>
                @error('body_reply')
                <div class="invalid-feedback">The field is required.</div>
                @enderror
              </div>
              <button type="submit" class="btn btn-primary">Submit</button>
            </form>

            @endif

          </div>
        </div>

        @endforeach

        @endif

	@endsection

</x-home-master>