@extends('layouts.app')
@section('content')
<div class="d-flex justify-content-end mb-2">
    <a href="{{route('tags.create')}}" class="btn btn-success">Add Tags</a>
</div>
<div class="card card-default">
    <div class="card-header">Tags</div>
    <div class="card-body">
        @if ($tags->count() > 0)
        <table class="table">
            <thead>
                <th>Name</th>
                <th>Post count</th>
                <th>Action</th>
            </thead>
            <tbody>
                @foreach ($tags as $tag)
                <tr>
                    <td>{{$tag->name}}</td>
                    <td>{{$tag->posts->count()}}</td>
                    <td><a class="btn btn-info btn-sm" href="{{route('tags.edit',$tag->id)}}">Edit</a>
                        <button class="btn btn-danger btn-sm" onclick="handleDelete({{$tag->id}})">Delete</button>
                    </td>
                </tr>

                @endforeach

            </tbody>
        </table>
        @else
        <h3 class="text-center">No tags yet</h3>
        @endif
        <div class="modal fade" id="modelDelete" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <form action="" method="POST" id="deletetagform">
                    @csrf
                    @method('DELETE')
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Delete tags</h5>
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
    var form = document.getElementById('deletetagform')
    form.action = '/tags/' + id
    console.log(form)
  $('#modelDelete').modal('show');
    }

</script>

@endsection