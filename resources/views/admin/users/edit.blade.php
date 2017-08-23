@extends('layouts.master')

@section('content')
<div class="container">
    @include('partials.errors')
    <div class="row">
        <div class="col-md-12">
            <form action="{{ route('admin.user.create') }}" method="post">
                <div class="form-group">
                    <label for="name">Name: </label>
                    <input type="text" id="name" name="name" class="form-control" value="{{ $user->name }}">
                </div>
                <div class="form-group">
                    <label for="name">Email: </label>
                    <input type="email" id="email" name="email" class="form-control" value="{{ $user->email }}">
                </div>
                {{ csrf_field() }}
                <input type="hidden" name="id" value="{{ $userId }}">
                <button type="submit" class="btn btn-primary">Save</button>
            </form>
        </div>
    </div>
</div>
@endsection