<x-admin-master>

  @section('content')

  <h1>Edit Category: {{$category->name}}</h1>

  @if(Session::has('category_updated'))

  <div class="alert alert-success">{{Session::get('category_updated')}}</div>

  @endif

  <div class="row">
     <div class="col-sm-6">
     <form method="POST" action="{{route('categories.update', $category->id)}}">
  @csrf
  @method('PUT')

    <div class="form-group">
      <label for="name">Name</label>
      <input class="form-control" type="text" name="name" id="name" value="{{$category->name}}">
    </div>

    <button class="btn btn-primary">Update</button>

     </form>
     </div>
  </div>

  @endsection
  
</x-admin-master>