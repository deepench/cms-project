@extends('layouts.app')
@section('content')
<div class="d-flex justify-content-end mb-2">
    <a href="{{route('categories.create')}}" class="btn btn-success">Add Category</a>
</div>
<div class="card card-default">
    <div class="card-header">Categories</div>
    <div class="card-body">
        @if ($categories->count() > 0)
        <table class="table">
            <thead>
                <th>Name</th>
                <th>Post count</th>
                <th>Action</th>
            </thead>
            <tbody>
                @foreach ($categories as $category)
                <tr>
                    <td>{{$category->name}}</td>
                    <td>{{$category->posts->count()}}</td>
                    <td><a class="btn btn-info btn-sm" href="{{route('categories.edit',$category->id)}}">Edit</a>
                        <button class="btn btn-danger btn-sm" onclick="handleDelete({{$category->id}})">Delete</button>
                    </td>


                </tr>

                @endforeach

            </tbody>
        </table>
        @else
        <h3 class="text-center">No categories yet</h3>
        @endif
        <div class="modal fade" id="modelDelete" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <form action="" method="POST" id="deletecategoryform">
                    @csrf
                    @method('DELETE')
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Delete Categories</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <p>Are you sure You want to delete?</p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
                            <button type="submit" class="btn btn-danger ">Yes</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


@endsection

@section('scripts')
<script>
    function handleDelete(id){
        console.log('delete',id);
    var form = document.getElementById('deletecategoryform')
    form.action = '/categories/' + id
    console.log(form)
  $('#modelDelete').modal('show');
    }

</script>

@endsection