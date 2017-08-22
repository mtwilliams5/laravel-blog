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
            <a href="{{ route('admin.tags.create') }}" class="btn btn-success">New Tag</a>
        </div>
    </div>
    <hr>
    @foreach($tags as $tag)
        <div class="row">
            <div class="col-md-6">
                <p><strong>{{ $tag->name }}</strong>
                    <small class="text-muted upper">{{ count($tag->posts) }} Post{{ (count($tag->posts) === 1) ? '' : 's' }}</small>
                </p>
            </div>
            <div class="col-md-6">
                <div class="btn-toolbar" role="toolbar" aria-label="Tag controls">
                    <a class="btn btn-default" role="button" href="{{ route('admin.tags.edit', ['id' => $tag->id]) }}">Edit</a>
                    <a class="btn btn-danger" role="button" href="{{ route('admin.tags.delete', ['id' => $tag->id]) }}">Delete</a>
                </div>
            </div>
        </div>
    @endforeach
</div>
@endsection