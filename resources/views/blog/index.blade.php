@extends('layouts.master')

@section('content')
    <div class="row">
        <div class="col-md-12 intro">
            <h2 class="slogan">The Beautiful Laravel</h2>
        </div>
    </div>
    <div class="container content">
        @foreach($posts as $post)
            <div class="row">
                <div class="col-md-12">
                    <a href="{{ route('blog.post', ['id' => $post->id]) }}"><h1 class="post-title">{{ $post->title }}</h1></a>
                    @if(!is_null($post->tags->first()))
                        <div class="tag-list small text-muted">
                            <i class="fa fa-lg fa-flip-horizontal fa-tag"> </i>
                            @foreach($post->tags as $tag)
                                {{ $tag->name }} 
                                @if ($tag != $post->tags->last())
                                    - 
                                @endif
                            @endforeach
                        </div>
                    @endif
                    <div class="post-content">{!! $post->content !!}</div>
                    <p><a href="{{ route('blog.post', ['id' => $post->id]) }}">Read more...</a></p>
                    <div class="post-info">
                        <small class="post-author">{{ $post->user->name }}</small><br />
                        <small class="post-date text-muted">{{$post->created_at->format('M j') }}</small>
                    </div>
                    <hr />
                </div>
            </div>
        @endforeach
        <div class = "row">
            <div class="col-md-12 text-center">
                {{ $posts->links() }}
            </div>
        </div>
    </div>
@endsection