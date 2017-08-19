@extends('layouts.master')

@section('content')
    <div class="row">
        <div class="col-md-12 intro">
            <h2 class="slogan">The Beautiful Laravel</h2>
        </div>
    </div>
    <div class="container">
        @foreach($posts as $post)
            <div class="row">
                <div class="col-md-12">
                    <a href="{{ route('blog.post', ['id' => $post->id]) }}"><h1 class="post-title">{{ $post->title }}</h1></a>
                    <p style="font-weight: bold">
                        @foreach($post->tags as $tag)
                            - {{ $tag->name }} -
                        @endforeach
                    </p>
                    <p>{{ $post->content }}</p>
                    <p><a href="{{ route('blog.post', ['id' => $post->id]) }}">Read more...</a></p>
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