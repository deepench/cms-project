@extends('layouts.app')
@section('content')
<div class="card card-default">
    <div class="card-header">{{isset($tag)?'Edit Tags' : 'Create Tags'}}</div>
    <div class="card-body">
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="list-group">
                @foreach ($errors->all() as $error)
                <div class="list lis-group-item">
                    {{$error}}
                </div>
                @endforeach
            </ul>
        </div>
        @endif
        <form action="{{isset($tag)? route('tags.update',$tag->id):route('tags.store')}}" method="post">
            @csrf
            @if (isset($tag))
            @method('PUT')
            @endif
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" id="name" class="form-control" name="name" value="{{isset($tag)?$tag->name:''}}">
            </div>
            <div class="form-group">
                <button class="btn btn-success">{{isset($tag)?'Update Tags':'Add Tags'}}</button>
            </div>
        </form>
    </div>
</div>
@endsection