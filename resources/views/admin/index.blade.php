@extends('layouts.master')

@section('content')
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
            <a href="{{ route('admin.create') }}" class="btn btn-success">New Post</a>
        </div>
    </div>
    <hr>
    @foreach($posts as $post)
        <div class="row">
            <div class="col-md-2">
                <p><strong>{{ $post->title }}</strong>
                    @if(!$post->published)
                        <small class="text-muted upper"> Draft</small>
                    @endif
                </p>
            </div>
            <div class="col-md-10">
                <div class="btn-toolbar" role="toolbar" aria-label="Post controls">
                    <div class="btn-group btn-group-sm" role="group" aria-label="Content controls">
                        <a class="btn btn-default" role="button" href="{{ route('admin.edit', ['id' => $post->id]) }}">Edit</a>
                        <a class="btn btn-danger" role="button" href="{{ route('admin.delete', ['id' => $post->id]) }}">Delete</a>
                    </div>
                    <div class="btn-group btn-group-sm" role="group" aria-label="Publish controls">
                        <a class="btn btn-primary" role="button" href="{{ route('admin.publish', ['id' => $post->id]) }}">Publish</a>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
</div>
@endsection