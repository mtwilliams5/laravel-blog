@extends('layouts.master')

@section('content')
<div class="container content">
    <div class="row">
        <div class="col-md-12">
            <h2 class="user-name">{{ $user->name }}</h2>
            <p class="text-muted">
                @if (Auth::user())
                    {{ $user->email }}<br />
                @endif
                <strong>{{ count($user->posts) }}</strong> Post{{ (count($user->posts) === 1) ? '' : 's' }}
                <ul class="list-inline user-social">
                    <li class="social-github"><a href="https://github.com/mtwilliams5" target="_blank"><i class="fa fa-github"></i></a></li>
                    <li class="social-twitter"><a href="https://twitter.com/mtwilliams4" target="_blank"><i class="fa fa-twitter"></i></a></li>
                    <li class="social-linkedin"><a href="https://uk.linkedin.com/in/matthew-williams-7b7b77b1" target="_blank"><i class="fa fa-linkedin"></i></a></li>
                    <li class="social-medium"><a href="https://medium.com/@mtwilliams4" target="_blank"><i class="fa fa-medium"></i></a></li>
                    <li class="social-axtras"><a href="http://xtras.anodyne-productions.com/profile/Krace" target="_blank">AX</a></li>
                </ul>
            </p>
        </div>
    </div>
    <hr />
    <div class="row">
        <div class="col-md-12">
            <h2 class="text-center">User's Posts</h2>
            @foreach($user->posts as $post)
                <div class="post">
                    <a href="{{ route('blog.post', ['id' => $post->id]) }}"><h3 class="post-title">{{ $post->title }}</h3></a>
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
                    @php
                        $start = strpos($post->content, '<p>');
                        $end = strpos($post->content, '</p>');
                        $post->content = substr($post->content, $start, $end-$start+4);
                    @endphp
                    <a href="{{ route('blog.post', ['id' => $post->id]) }}"><div class="post-content">{!! $post->content !!}</div></a>
                    <div class="post-info">
                        <small class="post-date text-muted">{{$post->created_at->format('M j') }} | {{ count($post->likes) }} Likes</small>
                    </div>
                </div>
                <hr />
            @endforeach
        </div>
    </div>
</div>
@endsection