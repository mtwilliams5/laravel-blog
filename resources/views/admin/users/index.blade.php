@extends('layouts.master')

@section('content')
@include('partials.admin.subnav')
<div class="container">
    @if(Session::has('info'))
        <div class="row">
            <div class="col-md-12">
                <p class="alert alert-info">{{ Session::get('info') }}</p>
            </div>
        </div>
    @endif
    <div class="row">
        <div class="col-md-12">
            <a href="{{ route('admin.user.create') }}" class="btn btn-success">Create User</a>
        </div>
    </div>
    <hr>
    @foreach($users as $user)
        <div class="row">
            <div class="col-md-6">
                <p><strong>{{ $user->name }}</strong><br />
                    <span class="text-muted">{{ $user->email }}</span><br />
                    @if(!is_null($user->posts->first()))
                        <small class="text-muted upper">{{ count($user->posts) }} Post{{ (count($user->posts) === 1) ? '' : 's' }}</small>
                    @endif
                </p>
            </div>
            <div class="col-md-6">
                <div class="btn-toolbar" role="toolbar" aria-label="User controls">
                    <a class="btn btn-default" role="button" href="#">View Profile</a>
                    <a class="btn btn-default" role="button" href="{{ route('admin.user.edit', ['id' => $user->id]) }}">Edit</a>
                    <a class="btn btn-danger" role="button" href="{{ route('admin.user.delete', ['id' => $user->id]) }}">Delete</a>
                </div>
            </div>
        </div>
    @endforeach
</div>
@endsection