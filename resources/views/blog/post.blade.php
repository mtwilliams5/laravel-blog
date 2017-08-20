@extends('layouts.master')

@section('content')
<div class="container content">
    <div class="row">
        <div class="col-md-12">
            <h2 class="post-title">{{ $post->title }}</h2>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="post-info">
                        <span class="post-author">{{ $post->user->name }}</span><br />
                        <small class="post-date text-muted">{{$post->created_at->format('M j') }}</small></a>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="post-content">{!! $post->content !!}</div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="post-likes">{{ count($post->likes) }} Likes | 
                <a href="{{ route('blog.post.like', ['id' => $post->id]) }}">Like</a>
            </div>
        </div>
    </div>
</div>
@endsection