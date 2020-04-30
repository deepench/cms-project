@extends('layouts.app')


@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">My Profile</div>
                <div class="card-body">
                    @if (session()->has('error'))
                    <div class="alert alert-danger">
                        {{session()->get('error')}}
                    </div>
                    @endif
                    <form action="{{route('users.update-profile')}}" method="post">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" name="name" id="name" value="{{$user->name}}" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="abou">About</label>
                            <textarea name="about" id="about" cols="5" rows="5"
                                class="form-control">{{$user->about}}</textarea>
                        </div>
                        <button type="submit" class="btn btn-success btn-sm">Update Profile</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection